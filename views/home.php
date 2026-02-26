<?php require "layouts/header.php"; ?>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="#">Asset Portal</a>
  </div>
</nav>

<main class="hero-section">
  <div class="container d-flex flex-column align-items-center">

    <p class="hero-eyebrow">Lifecycle Management System</p>

    <h1 class="hero-title">
      Asset Tracking<br><span>Portal</span>
    </h1>

    <p class="hero-subtitle">
      Smart, unified platform for managing your asset inventory, maintenance schedules, and lifecycle reports.
    </p>

    <div class="portal-grid">

      <div class="card-glass">
        <div class="card-icon card-icon-admin">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
        </div>
        <h4>Admin Panel</h4>
        <p>Manage assets, generate reports & oversee maintenance workflows.</p>
        <a href="/ASSET-TRACKING-PORTAL/public/admin/login" class="btn-portal btn-admin">
          Enter Panel
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
        </a>
      </div>

      <div class="card-glass">
        <div class="card-icon card-icon-user">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
        </div>
        <h4>User Portal</h4>
        <p>Browse, rent, or purchase assets with real-time availability tracking.</p>
        <a href="/ASSET-TRACKING-PORTAL/public/user/login" class="btn-portal btn-user">
          Enter Portal
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
        </a>
      </div>

    </div>

    <div class="status-bar">
      <div class="status-item">
        <span class="status-dot"></span>
        System Online
      </div>
      <div class="status-divider"></div>
      <div class="status-item">Secure Connection</div>
      <div class="status-divider"></div>
      <div class="status-item">v2.0 Ready</div>
    </div>

  </div>
</main>

<!-- CHATBOT ICON -->
<!-- CHATBOT ICON -->
<div id="chatbot-icon">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" width="26" height="26">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
    </svg>
    <span class="chatbot-ping"></span>
</div>

<!-- CHATBOT WINDOW -->
<div id="chatbot-window" class="chatbot-hidden">

    <div class="chatbot-header">
        <div class="chatbot-header-info">
            <div class="chatbot-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
            </div>
            <div>
                <div class="chatbot-name">Asset Assistant</div>
                <div class="chatbot-status">
                    <span class="chatbot-status-dot"></span> Online
                </div>
            </div>
        </div>
        <button id="chatbot-close" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <div class="chatbot-body">
        <div class="chatbot-greeting">
            <div class="chatbot-bubble bot-bubble">
                <span>👋</span> Hi there! I'm your Asset Assistant. What would you like to know?
            </div>
        </div>

        <p class="chatbot-faq-label">Quick Questions</p>

        <div class="faq-item" onclick="showAnswer(1)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/></svg>
            What is Asset Tracking Portal?
        </div>

        <div class="faq-item" onclick="showAnswer(2)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/></svg>
            How can I buy or rent an asset?
        </div>

        <div class="faq-item" onclick="showAnswer(3)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/></svg>
            How is depreciation calculated?
        </div>

        <div class="faq-item" onclick="showAnswer(4)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l5.654-4.654m5.65-4.652 3.033-2.496c.384-.317.626-.74.766-1.208"/></svg>
            How does maintenance tracking work?
        </div>

        <div id="chatbot-answer"></div>
    </div>

</div>

<style>
/* ── Chatbot Icon ── */
#chatbot-icon {
    position: fixed;
    bottom: 28px;
    right: 28px;
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0891b2, #00d4ff);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 4px 24px rgba(0, 212, 255, 0.35), 0 0 0 0 rgba(0, 212, 255, 0.4);
    z-index: 9999;
    color: #080c14;
    transition: transform 0.25s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.25s ease;
    animation: icon-breathe 3s ease-in-out infinite;
}

#chatbot-icon:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 32px rgba(0, 212, 255, 0.55);
    animation: none;
}

@keyframes icon-breathe {
    0%, 100% { box-shadow: 0 4px 24px rgba(0,212,255,0.35), 0 0 0 0 rgba(0,212,255,0.3); }
    50%       { box-shadow: 0 4px 24px rgba(0,212,255,0.35), 0 0 0 10px rgba(0,212,255,0); }
}

.chatbot-ping {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #22d3a5;
    border: 2px solid #080c14;
    box-shadow: 0 0 6px #22d3a5;
}

/* ── Chatbot Window ── */
#chatbot-window {
    position: fixed;
    bottom: 100px;
    right: 28px;
    width: 340px;
    background: #0e1520;
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 24px 60px rgba(0,0,0,0.6), 0 0 0 1px rgba(0,212,255,0.08);
    z-index: 9999;
    transform-origin: bottom right;
    transition: opacity 0.3s ease, transform 0.35s cubic-bezier(0.23, 1, 0.32, 1);
    font-family: 'DM Sans', sans-serif;
}

.chatbot-hidden {
    display: none !important;
}

.chatbot-visible {
    display: block;
    animation: chat-pop 0.35s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

@keyframes chat-pop {
    from { opacity: 0; transform: scale(0.88) translateY(16px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}

/* ── Header ── */
.chatbot-header {
    background: linear-gradient(135deg, rgba(8,12,20,0.95), rgba(14,21,32,0.95));
    border-bottom: 1px solid rgba(0,212,255,0.12);
    padding: 16px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: rgba(0,212,255,0.1);
    border: 1px solid rgba(0,212,255,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #00d4ff;
    flex-shrink: 0;
}

.chatbot-name {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    color: #f0f6ff;
    letter-spacing: -0.01em;
}

.chatbot-status {
    font-size: 0.72rem;
    color: #6b7fa3;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 2px;
}

.chatbot-status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #22d3a5;
    box-shadow: 0 0 6px #22d3a5;
    display: inline-block;
    animation: pulse-online 2s ease-in-out infinite;
}

@keyframes pulse-online {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

#chatbot-close {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    color: #6b7fa3;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
    padding: 0;
}

#chatbot-close:hover {
    background: rgba(255,80,80,0.12);
    color: #ff6b6b;
    border-color: rgba(255,80,80,0.2);
}

/* ── Body ── */
.chatbot-body {
    padding: 18px;
    max-height: 360px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.08) transparent;
}

.chatbot-body::-webkit-scrollbar { width: 4px; }
.chatbot-body::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 4px; }

.chatbot-greeting {
    margin-bottom: 18px;
}

.chatbot-bubble {
    padding: 12px 14px;
    border-radius: 14px 14px 14px 4px;
    font-size: 0.87rem;
    line-height: 1.55;
    display: flex;
    gap: 8px;
    align-items: flex-start;
    background: rgba(0,212,255,0.07);
    border: 1px solid rgba(0,212,255,0.12);
    color: #c8d8f0;
}

.chatbot-faq-label {
    font-size: 0.68rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #6b7fa3;
    margin-bottom: 10px;
    font-weight: 500;
}

/* ── FAQ Items ── */
.faq-item {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    padding: 11px 14px;
    border-radius: 10px;
    margin-bottom: 8px;
    cursor: pointer;
    font-size: 0.85rem;
    color: #a0b4cc;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
}

.faq-item svg {
    flex-shrink: 0;
    color: #00d4ff;
    opacity: 0.7;
}

.faq-item:hover {
    background: rgba(0,212,255,0.07);
    border-color: rgba(0,212,255,0.2);
    color: #f0f6ff;
    transform: translateX(3px);
}

.faq-item:hover svg {
    opacity: 1;
}

/* ── Answer Bubble ── */
.answer-bubble {
    margin-top: 14px;
    padding: 13px 15px;
    background: rgba(124,58,237,0.1);
    border: 1px solid rgba(124,58,237,0.2);
    border-radius: 4px 14px 14px 14px;
    font-size: 0.86rem;
    line-height: 1.6;
    color: #c8d8f0;
    animation: answer-in 0.3s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

@keyframes answer-in {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Responsive ── */
@media (max-width: 420px) {
    #chatbot-window {
        width: calc(100vw - 24px);
        right: 12px;
        bottom: 90px;
    }
    #chatbot-icon {
        bottom: 16px;
        right: 16px;
        width: 52px;
        height: 52px;
    }
}
</style>

<script>
const chatbotIcon   = document.getElementById('chatbot-icon');
const chatbotWindow = document.getElementById('chatbot-window');
const chatbotClose  = document.getElementById('chatbot-close');
const chatbotAnswer = document.getElementById('chatbot-answer');

chatbotIcon.onclick = () => {
    const isHidden = chatbotWindow.classList.contains('chatbot-hidden');
    if (isHidden) {
        chatbotWindow.classList.remove('chatbot-hidden');
        chatbotWindow.classList.add('chatbot-visible');
    } else {
        chatbotWindow.classList.add('chatbot-hidden');
        chatbotWindow.classList.remove('chatbot-visible');
    }
};

chatbotClose.onclick = () => {
    chatbotWindow.classList.add('chatbot-hidden');
    chatbotWindow.classList.remove('chatbot-visible');
};

function showAnswer(id) {
    let answer = "";

    if (id === 1) {
        answer = "Asset Tracking Portal helps manage assets, track maintenance, calculate depreciation, and monitor inventory efficiently.";
    }
    else if (id === 2) {
        answer = "Login as a user, browse available assets, and choose Buy or Rent. The system automatically records ownership.";
    }
    else if (id === 3) {
        answer = "We use the Straight-Line Depreciation formula: (Purchase Cost - Salvage Value) / Useful Life.";
    }
    else if (id === 4) {
        answer = "Admin tracks maintenance status. Assets nearing warranty expiry are highlighted automatically.";
    }

    chatbotAnswer.innerHTML = "<div class='answer-bubble'>" + answer + "</div>";
}
</script>

<?php require "layouts/footer.php"; ?>