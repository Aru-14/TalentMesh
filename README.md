## 📌 TalentMesh – Job Portal Web Application

**TalentMesh** is a secure, scalable web application that bridges the gap between job seekers and employers. Built using PHP, MySQL, and Bootstrap, and deployed on InfinityFree, it features robust authentication, real-time resume handling, and email-based communication.

---

## 🚀 Key Features

- **User Roles:** Separate login/register for Employers and Job Seekers.
- **PDF-Only Resume Upload:** Candidates can upload resumes (PDF only) during application.
- **Job Application Dashboard:** Users can view all job applications and track their status (Accepted/Rejected).
- **Email Verification:** Only verified employers can register — eliminating fake or fraudulent postings.
- **Employer Tools:**
  - Post, update, or delete job listings.
  - View applicants and their resumes.
  - Accept or reject candidates.
  - Send **custom email messages** to selected applicants.
- **Secure Login System:** Session-based authentication to ensure authorized access.
- **Live Email Confirmation:** Job seekers receive a confirmation mail when their application is accepted.

---

## ✅ Additional Features

- **Password Hashing:** User credentials are securely stored using password hashing.
- **Token-Based Email Verification:** Generates a time-limited (10 min) token for secure email verification.
- **Robust Error Handling:** Includes comprehensive form validation and proper error feedback.
- **Duplicate Registration Prevention:** Server-side validation to block duplicate users.
- **PHPMailer Integration:** Used for sending verification and job confirmation emails.
- **Detailed Resume System:** Employers can view full applicant profiles including LinkedIn, skills, experience, and resume.
- **Search Functionality:** Job seekers can filter jobs by title, category, or employment type.
- **Multiple Application Prevention:** Applicants are restricted from applying to the same job more than once.
- **Clean UI Design:** Built using responsive Bootstrap layout across all user pages.

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, Bootstrap  
- **Backend:** PHP (Core PHP without frameworks)  
- **Database:** MySQL  
- **Hosting:** InfinityFree (custom subdomain with free SSL)  
- **Emailing:** **PHPMailer** used via included `/PHPMailer/` folder to send emails (verification, status updates)

---

## 📂 Database Schema Overview

Four tables used in MySQL:

1. **user** – Stores job seeker information.
2. **employer** – Stores employer data.
3. **job_posts** – Stores job details posted by employers.
4. **application** – Stores seeker applications.

(*Schema visuals included in `/images/schema/` folder if uploading.*)

---

## 📈 Application Flow

1. Employer registers and verifies via email → logs in → posts jobs.  
2. Job Seeker registers → applies to jobs by uploading a PDF resume.  
3. Employer views applicants → accepts/rejects them → sends custom mail to selected via PHPMailer.  
4. Job Seeker sees application status in dashboard → gets notified via email if accepted.

---

## 📦 Installation

1. Clone this repository  
   `git clone https://github.com/Aru-14/TalentMesh.git`
2. Import the SQL schema (tables) into your MySQL database.
3. Update `connect.php` with your database credentials.
4. Place files in `/htdocs/` (for XAMPP) or deploy to InfinityFree.
5. Configure **PHPMailer** settings in the `/PHPMailer/` folder to enable email delivery (SMTP or mail function).

---

## 🌐 Live Demo

[[http://talentmesh.42web.io](http://talentmesh.42web.io/)]

---

Please Note: Some images have been shared for relations I have used, etc.

![Screenshot 2025-04-14 125709](https://github.com/user-attachments/assets/ba033c44-6cb1-4138-a509-b08e8281373c)
![Screenshot 2025-04-14 125725](https://github.com/user-attachments/assets/567e3dda-9d3b-4253-8e31-a2e4cc86e0bf)
![Screenshot 2025-04-14 125739](https://github.com/user-attachments/assets/c0b50b00-788f-47f4-98d8-ccc7dfabdb6d)
![Screenshot 2025-04-14 125751](https://github.com/user-attachments/assets/7cab6320-743e-41c2-8783-d45a397ff134)
![Screenshot 2025-04-14 125803](https://github.com/user-attachments/assets/d0aad940-cf22-4969-a85f-1fea11dd6733)
![Screenshot 2025-04-14 125815](https://github.com/user-attachments/assets/b4c90146-6391-418b-99ed-d50f154e5272)




## 📜 Copyright

© 2025 Arunima Paunikar. All rights reserved.
