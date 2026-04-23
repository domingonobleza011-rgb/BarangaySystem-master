<?php 
    error_reporting(E_ALL ^ E_WARNING);
    
    if(!isset($_SESSION)) {
        $showdate = date("Y-m-d");
        date_default_timezone_set('Asia/Manila');
        $showtime = date("h:i:a");
        $_SESSION['storedate'] = $showdate;
        $_SESSION['storetime'] = $showdate;
        session_start();
    }

    include('autoloader.php');
    require('classes/main.class.php');
    $bmis->login();
    require('classes/staff.class.php');
    $userdetails = $bmis->get_userdata();
    $view = $staffbmis->view_staff();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barangay Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-blue: #007bff;
            --dark-blue: #0056b3;
            --text-gray: #6c757d;
        }

        /* Remove all default margins and padding for true full screen */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevents accidental scrolling */
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 30px;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-blue) !important;
            font-size: 1.2rem;
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
            margin-left: 20px;
            cursor: pointer;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
        }
        .main-container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* Left Section: Information (Branding) */
        .info-panel {
            flex: 1;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5%;
            text-align: center;
            border-right: 1px solid #dee2e6;
        }

        .info-panel img {
            width: 120px;
            margin-bottom: 2rem;
        }

        .info-panel h1 {
            color: var(--primary-blue);
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 3rem;
        }

        .content-box {
            max-width: 450px;
        }

        .content-box h6 {
            font-weight: bold;
            letter-spacing: 1px;
            color: #333;
            text-transform: uppercase;
        }

        .content-box p {
            color: var(--text-gray);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Right Section: Login Form */
        .login-panel {
            flex: 1;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5%;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .login-panel h2 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--text-gray);
            margin-bottom: 2.5rem;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group-text {
            background-color: transparent;
            color: var(--text-gray);
            border-right: none;
        }

        .form-control {
            border-left: none;
            padding: 0.75rem;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .btn-signin {
            background-color: var(--primary-blue);
            border: none;
            padding: 0.8rem;
            font-weight: bold;
            font-size: 1rem;
            transition: 0.3s;
        }

        .btn-signin:hover {
            background-color: var(--dark-blue);
        }

        .reg-text {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .reg-text a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            .info-panel {
                display: none; /* Only show form on mobile */
            }
        }
        .official-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #f8f9fa;
    }

    .official-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        background: #fff;
    }

    .avatar-circle {
        width: 80px;
        height: 80px;
        background: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border: 3px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .official-name {
        font-size: 1.1rem;
        color: #2d3436;
        margin-bottom: 2px;
        text-transform: capitalize;
    }

    .official-position {
        font-size: 0.85rem;
        letter-spacing: 1px;
        color: #0d6efd;
    }

    .modal-content {
        border: none;
        border-radius: 20px;
        overflow: hidden;
    }

    .modal-header {
        border-bottom: none;
        padding: 25px;
    }

    #support-window {
    transition: all 0.3s ease-in-out;
    bottom: 80px !important; /* Positions it above the toggle button */
}

/* Custom scrollbar for the chat area */
#support-content::-webkit-scrollbar {
    width: 5px;
}
#support-content::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 10px;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-landmark"></i> SAN PEDRO IRIGA</a>
            <div class="ms-auto d-flex">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#officialsModal">
                    <i class="fas fa-users"></i> Barangay Officials
                </a>
                <a class="nav-link" href="resident_registration.php">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            </div>
        </div>
    </nav>
    <div class="main-container">
        
        <div class="info-panel">
            <div class="content-box">
                <img src="icons/logo.png" alt="Logo">
                <h1>Barangay San Pedro Management System</h1>

                
                <h6>Our Mission</h6>
                <p>To provide proactive, tech-driven administrative services that empower the youth and ensure transparent governance.</p>

                <h6>Our Vision</h6>
                <p>A digitally integrated community where every resident has seamless access to services.</p>
            </div>
        </div>
<button type="button" class="btn border-0 shadow-lg position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center" 
        id="chat-toggle-btn" 
        style="width: 65px; height: 65px; z-index: 1050; border-radius: 20px; background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); transition: transform 0.3s ease;">
    <i class="bi bi-robot text-white fs-3"></i>
</button>

<div id="chat-window" class="card shadow-2xl border-0 position-fixed bottom-0 end-0 m-4 d-none" 
     style="width: 380px; height: 550px; z-index: 1051; border-radius: 24px; overflow: hidden; backdrop-filter: blur(10px); background: rgba(9, 152, 218, 0.95);">
    
    <div class="card-header border-0 d-flex justify-content-between align-items-center px-4 py-3" 
         style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);">
        <div class="d-flex align-items-center">
            <div class="bg-primary bg-opacity-25 rounded-circle p-2 me-2">
                <i class="bi bi-person-circle"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white fw-bold">Smart Assistant</h6>
                <small class="text-white-50" style="font-size: 0.7rem;">● Online & Ready</small>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white opacity-75" id="close-chat" style="font-size: 0.8rem;"></button>
    </div>

    <div class="card-body overflow-auto p-4" id="chat-content" style="background-color: #fdfdff;">
        <div class="d-flex mb-3">
            <div class="bg-light p-3 rounded-4 shadow-sm text-dark small border" style="border-bottom-left-radius: 4px !important; max-width: 85%;">
                ✨ Hello! I'm your AI assistant. How can I help you with your <strong>enrollment</strong> or <strong>barangay</strong> inquiries today?
            </div>
        </div>
    </div>

    <div class="card-footer bg-white border-0 p-3">
        <div class="input-group shadow-sm rounded-pill overflow-hidden border">
            <input type="text" id="user-input" class="form-control border-0 px-4 py-2" placeholder="Ask me anything..." style="background: #f8f8f8; outline: none;">
            <button class="btn btn-white border-0 text-primary px-3" id="send-btn">
                <i class="bi bi-send-fill fs-5"></i>
            </button>
        </div>
    </div>
</div>

        <div class="login-panel">
            <div class="form-container">
                <h2>Welcome Back</h2>
                <p class="subtitle">Please enter your credentials to log in.</p>

                <form method="post">
                    <label class="form-label">Email or Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Email or Phone Number" name="login_identity" required>
                    </div>

                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="passInput" placeholder="Enter password" name="password" required>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="showCheck" onclick="togglePass()">
                        <label class="form-check-label" for="showCheck" style="font-size: 0.85rem; color: #555;">Show Password</label>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary btn-signin w-100">SIGN IN</button>
                </form>

                <p class="reg-text">
                    Don't have an account? <a href="resident_registration.php">Register here</a>
                </p>
            </div>
        </div>
<div class="modal fade" id="officialsModal<?= $view['id_user'];?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users-cog me-3 fa-2x"></i>
                    <div>
                        <h5 class="modal-title fw-bold mb-0">Sangguniang Barangay Members</h5>
                        <small class="opacity-75">San Pedro, Iriga City</small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4">
                    <?php 
                    // Note: Ensure $view is your array of staff/officials
                    if(is_array($view)) { 
                        foreach($view as $row) { 
                    ?>
                       <div class="col-md-4 col-sm-6">
    <div class="official-card p-4 text-center">
        <div class="avatar-circle">
            <?php if (!empty($row['photo']) && file_exists($row['photo'])): ?>
                <img src="/BarangaySystem-master/<?= $row['photo']; ?>" 
     style="width: 100%; height: 100%; object-fit: cover;">
            <?php else: ?>
                <i class="fas fa-user-circle fa-3x text-secondary"></i>
            <?php endif; ?>
        </div>
        
        <h5 class="official-name fw-bold">
            <?= htmlspecialchars($row['fname'] . ' ' . $row['mi'] . ' ' . $row['lname']); ?>
        </h5>
        
        <p class="official-position fw-bold text-uppercase">
            <?= htmlspecialchars($row['position']); ?>
        </p>
    </div>
</div>
                    <?php 
                        } 
                    } else {
                        echo '<p class="text-center text-muted">No officials found.</p>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
// Function to append messages to the chat UI
function appendMessage(sender, text, isUser) {
    const chatContent = document.getElementById('chat-content');
    const alignment = isUser ? 'text-end' : 'text-start';
    const bgClass = isUser ? 'bg-primary text-white' : 'bg-light border text-dark';
    
    chatContent.innerHTML += `
        <div class="${alignment} mb-2">
            <span class="${bgClass} p-2 rounded-3 d-inline-block" style="max-width: 80%;">
                ${text}
            </span>
        </div>`;
    chatContent.scrollTop = chatContent.scrollHeight;
}

// The main Send function with Retry Logic
document.getElementById('send-btn').addEventListener('click', async function() {
    const inputField = document.getElementById('user-input');
    const userMessage = inputField.value.trim();

    if (userMessage === "") return;

    // 1. Show User Message
    appendMessage('You', userMessage, true);
    inputField.value = ""; 

    // 2. Show "Typing..." placeholder
    const chatContent = document.getElementById('chat-content');
    const typingId = "typing-" + Date.now();
    chatContent.innerHTML += `<div class="text-start mb-2" id="${typingId}"><small class="text-muted">Assistant is thinking...</small></div>`;
    chatContent.scrollTop = chatContent.scrollHeight;

    // 3. Connect to chat_helper.php with a retry attempt
    let attempts = 0;
    let maxAttempts = 2;
    let success = false;

    while (attempts < maxAttempts && !success) {
        try {
            const response = await fetch('assistant_logic.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: userMessage })
            });

            const data = await response.json();

            // Check if Google is just busy
            if (data.reply.includes("high demand")) {
                attempts++;
                if (attempts < maxAttempts) {
                    document.getElementById(typingId).innerHTML = `<small class="text-muted">Server busy, retrying (${attempts})...</small>`;
                    await new Promise(resolve => setTimeout(resolve, 2000)); // Wait 2 seconds before retry
                    continue;
                }
            }

            // If we get here, we either have a real answer or we've run out of retries
            document.getElementById(typingId).remove(); // Remove typing indicator
            appendMessage('Bot', data.reply, false);
            success = true;

        } catch (error) {
            console.error("Connection error:", error);
            document.getElementById(typingId).innerHTML = `<small class="text-danger">Connection lost. Check your internet.</small>`;
            break;
        }
    }
});

// Window Toggle Logic
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chat-toggle-btn');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');

    chatToggle.addEventListener('click', () => chatWindow.classList.toggle('d-none'));
    closeChat.addEventListener('click', () => chatWindow.classList.add('d-none'));
});        function togglePass() {
            const passField = document.getElementById("passInput");
            passField.type = passField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>