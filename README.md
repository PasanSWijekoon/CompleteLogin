<h1>User Authentication and Google Sign-In Documentation</h1>
    <h2>Overview</h2>
    <p>This documentation provides an overview and explanation of the PHP code snippets that handle user authentication
        and Google Sign-In integration. The provided code allows users to sign in using their Google accounts and
        updates or inserts user data based on the response from Google Sign-In.</p>
    <h2>Table of Contents</h2>
    <ol>
        <li><a href="#requirements" target="_new">Requirements</a></li>
        <li><a href="#installation" target="_new">Installation</a></li>
        <li><a href="#code-explanation" target="_new">Code Explanation</a>
            <ul>
                <li><a href="#file-structure" target="_new">File Structure</a></li>
                <li><a href="#user-authentication-and-google-sign-in" target="_new">User Authentication and Google
                        Sign-In</a></li>
                <li><a href="#password-reset" target="_new">Password Reset</a></li>
                <li><a href="#updating-password" target="_new">Updating Password</a></li>
                <li><a href="#session-handling" target="_new">Session Handling</a></li>
            </ul>
        </li>
        <li><a href="#usage" target="_new">Usage</a></li>
        <li><a href="#security-considerations" target="_new">Security Considerations</a></li>
        <li><a href="#troubleshooting" target="_new">Troubleshooting</a></li>
        <li><a href="#contributing" target="_new">Contributing</a></li>
        <li><a href="#license" target="_new">License</a></li>
    </ol>
    <h2>Requirements</h2>
    <ul>
        <li>PHP server (version 7 or above)</li>
        <li>MySQL database</li>
        <li>Composer (for PHPMailer library)</li>
    </ul>
    <h2>Installation</h2>
    <ol>
        <li>
            <p>Clone the repository or download the provided PHP files to your server.</p>
        </li>
        <li>
            <p>Create a MySQL database and configure the connection details in <code>./includes/config.php</code>.</p>
        </li>
        <li>
            <p>Run the SQL script in <code>./includes/database.sql</code> to create the necessary tables.</p>
        </li>
        <li>
            <p>Install Composer dependencies:</p>
            <pre><div class="bg-black rounded-md"><div class="flex items-center relative text-gray-200 bg-gray-800 gizmo:dark:bg-token-surface-primary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>bash</span><button class="flex ml-auto gizmo:ml-0 gap-2 items-center"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="icon-sm" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>Copy code</button></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">composer install
</code></div></div></pre>
        </li>
    </ol>
    <h2>Code Explanation</h2>
    <h3>File Structure</h3>
    <ul>
        <li><code>./includes/config.php</code>: Configuration file for database connection.</li>
        <li><code>./includes/database.sql</code>: SQL script to create the required database tables.</li>
        <li><code>./vendor/phpmailer/phpmailer/src/</code>: PHPMailer library files.</li>
        <li><code>./login.php</code>: Login page with Google Sign-In and traditional login.</li>
        <li><code>./register.php</code>: Registration page with Google Sign-In and traditional registration.</li>
        <li><code>./resetpassword.php</code>: Password reset page.</li>
        <li><code>./assets/</code>: Folder containing CSS and JS files.</li>
        <li><code>./assets/js/main.js</code>: Main JavaScript file for client-side functionality.</li>
    </ul>
    <h3>User Authentication and Google Sign-In</h3>
    <h4><code>login.php</code></h4>
    <p>Handles user login, including Google Sign-In. It verifies user credentials, updates login attempts, and manages
        sessions.</p>
    <h4><code>register.php</code></h4>
    <p>Manages user registration, including Google Sign-In. Inserts new user data into the database and handles session
        creation.</p>
    <h4><code>resetpassword.php</code></h4>
    <p>Allows users to request a password reset link via email. Generates a unique token for each request and sends a
        reset link via email using PHPMailer.</p>
    <h4><code>updatepassword.php</code></h4>
    <p>Updates the user's password in the database after a successful password reset.</p>
    <h4><code>session_destroy.php</code></h4>
    <p>Destroys the session when a user logs out.</p>
    <h3>Usage</h3>
    <ol>
        <li>Access the application through the web browser.</li>
        <li>Use the login page to sign in with Google or traditional credentials.</li>
        <li>Register a new account if needed.</li>
        <li>Reset the password if forgotten.</li>
        <li>Logout to end the session.</li>
    </ol>
    <h3>Security Considerations</h3>
    <ul>
        <li>Always sanitize and validate user inputs to prevent SQL injection and other security vulnerabilities.</li>
        <li>Ensure secure storage of sensitive information such as database credentials.</li>
        <li>Use HTTPS to encrypt data transmitted between the client and server.</li>
    </ul>
    <h3>Troubleshooting</h3>
    <p>If you encounter issues:</p>
    <ul>
        <li>Check the server logs for error messages.</li>
        <li>Verify database connection details and table structure.</li>
        <li>Ensure the PHPMailer library is correctly installed.</li>
    </ul>
    <h3>Contributing</h3>
    <p>Contributions are welcome! Feel free to open issues or submit pull requests.</p>
</div>
