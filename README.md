# SQL Injection Vulnerability Web Application Lab 🚀

Welcome to the **SQL Injection (SQLi) Vulnerability Web Application Lab**! This project simulates common SQL Injection vulnerabilities and provides an environment for penetration testing and security awareness. Below, you'll find detailed instructions to get the project up and running on your local machine.

## 🛠️ **Installation & Setup**

### **Prerequisites**

Before you start, ensure that the following are installed on your system:

- **XAMPP** (or any local PHP & MySQL environment)
- A **web browser** (Chrome, Firefox, Safari, etc.)
- **Burp Suite** (optional but recommended for vulnerability testing)

---

### Downloading and Setting Up the Project

1. **Download the Project ZIP File**  
   Go to the [GitHub repository](https://github.com/Piyush-1723/SQLi-Lab) and click the "Code" button. Select **Download ZIP** to download the project files to your local system.

2. **Extract the ZIP File**  
   After downloading, extract the contents of the ZIP file to a folder on your system.

3. **Rename the Extracted Folder**  
   Rename the extracted folder to `SQLi Lab` (or any name you prefer). Ensure that the folder now contains the following subfolders:
   - **Login** (containing `login.html`, `login.php`, etc.)
   - **Database** (containing the database `.sql.zip` file)
   - **Search** (containing the search-related files)

4. **Move to XAMPP's `htdocs`**  
   Place the `SQLi Lab` folder into the `htdocs` directory of your XAMPP installation (typically located at `C:\xampp\htdocs\`).

5. **Continue with Setup**  
   Follow the steps in the Setting Up XAMPP and Setting Up the Database sections to complete the installation.

---

Let me know if you'd like any further modifications!
### **Setting Up XAMPP** 🔧

1. **Download & Install XAMPP**  
   - Head over to the official [XAMPP website](https://www.apachefriends.org) and download the installer for your operating system.
   - Install the software by following the on-screen instructions.

2. **Start Apache and MySQL Services**  
   - Open the XAMPP Control Panel.
   - Start **Apache** and **MySQL** to enable the web server and database server.

3. **Place Project Files in the `htdocs` Directory**  
   - Extract the project folder.
   - Move the project folder to `\xampp\htdocs\`.

---

### **Setting Up the Database** 💻

1. **Open phpMyAdmin**  
   - In your browser, navigate to: `http://localhost/phpmyadmin/`.

2. **Import the Database**  
   - Click on the **Import** tab in phpMyAdmin.
   - Choose the `127_0_0_1.sql.zip` file provided in the project.
   - Hit the **Go** button to import the database into MySQL.

3. **Verify the Database**  
   - Ensure that the **employee** database is created and contains necessary tables like `users`, `employee`, `department`, etc.

---

### **Configuring Database Connection** 🔑

1. **Open `dbconnection.php`**  
   - Open the `dbconnection.php` file in your favorite text editor.
   - Ensure that the database credentials match your local MySQL setup (host, username, password).
   - Save the changes and close the file.

---

### **Running the Application** 🖥️

Once everything is set up, you're ready to dive into the application! Open your browser and access the following pages:

- **Login Page**:  
  `http://localhost/SQLi%20Lab/login.html`

- **Signup Page**:  
  `http://localhost/SQLi%20Lab/signup.html`

- **Search Page**:  
  `http://localhost/SQLi%20Lab/employee_index.html`

---


## 🔧 **Tools Used**

- **XAMPP**: Local PHP and MySQL development environment
- **PHP**: Server-side scripting language
- **MySQL**: Database system for storing employee data
- **Burp Suite** (optional): Web application security testing tool (for testing vulnerabilities)

---

## 📚 **Learning Objectives**

This project helps in understanding and testing:

- The impact of **SQL Injection (SQLi)** vulnerabilities
- Best practices for **secure coding** to prevent SQLi
- Techniques for **penetration testing** and ethical hacking

---
