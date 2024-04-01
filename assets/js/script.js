const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
let chatbotState = "default";

const ADD_NAME_ENDPOINT = "./addName.php";
let userMessage = null;
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi;
}

const handleChatGPT = async (userMessage) => {
    const API_KEY = "YOURAPI";
    const API_URL = "https://api.openai.com/v1/chat/completions";

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{ role: "user", content: userMessage }],
        }),
    };

    const response = await fetch(API_URL, requestOptions);
    const data = await response.json();

    return data.choices[0].message.content.trim();
};

const addNameToDatabase = async (scheduletime) => {
    try {
        const response = await fetch(ADD_NAME_ENDPOINT, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ scheduletime }),
        });

        console.log(response.status); 

        const data = await response.json();

        console.log(data); 
        return data.message;

    } catch (error) {
        console.error("Error adding name to the database:", error);
        return "Sorry, there was an error processing your request.";
    }
};

const handleDialogflowRequest = async (userMessage) => {
    const DIALOGFLOW_API_KEY = "YOUR";//change this
    const projectId = "YOUR";//changethis
    const sessionId = "1234";

    const API_URL = `https://dialogflow.googleapis.com/v2/projects/${projectId}/agent/sessions/${sessionId}:detectIntent`;

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${DIALOGFLOW_API_KEY}`
        },
        body: JSON.stringify({
            queryInput: {
                text: {
                    text: userMessage,
                    languageCode: "en",
                },
            },
        }),
    };

    const response = await fetch(API_URL, requestOptions);
    const data = await response.json();

    return data.queryResult.fulfillmentText;
};

const handleChat = async () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;

    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    const setScheduleTimePattern = /set\s*schedule\s*time\s*(\d{1,2}:\d{2}\s*[APMapm]{0,2})/i;
    const match = userMessage.match(setScheduleTimePattern);

    if (match) {
        const scheduleTime = match[1]; 

   
    const response = await addNameToDatabase(scheduleTime);

   
    const responseLi = createChatLi(response, "incoming");
    chatbox.appendChild(responseLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);

    return;  
    }

    if (/set schedule time/i.test(userMessage)) {
        
        const responseLi = createChatLi("Sure! What time are you free? provide with AM/PM", "incoming");
        chatbox.appendChild(responseLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);

        
        chatbotState = "expectingscheduletime";
        return; 
    }

    if (chatbotState === "expectingscheduletime") {
        
        const scheduletime = userMessage.trim();

        
        const response = await addNameToDatabase(scheduletime);

        
        const responseLi = createChatLi(response, "incoming");
        chatbox.appendChild(responseLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);

        
        chatbotState = "default";
        return; 
    }


   
    const predefinedQuestions = [
        {
            pattern: /help/i,
            handler: async () => "type 'set schedule time' to set the garbage pick up time "
        },
        {
            pattern: /hello/i,
            handler: async () => "Hi there! How can I assist you?"
        },
       
    ];

    const matchedQuestion = predefinedQuestions.find(question => question.pattern.test(userMessage));

    if (matchedQuestion) {
        const response = await matchedQuestion.handler();
        const responseLi = createChatLi(response, "incoming");
        chatbox.appendChild(responseLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
    } else {
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);

        const chatgptResponse = await handleChatGPT(userMessage);
        const responseLi = createChatLi(chatgptResponse, "incoming");
        chatbox.appendChild(responseLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }
};

chatInput.addEventListener("input", () => {
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
