<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>TalentMesh</title>
    <style>
      body{
        background-image:url('bg.jpg');
      }
      .bg-bright{
        background:linear-gradient(23deg,rgba(176, 176, 176, 0.231),rgba(255, 255, 255, 0.178));
      }
        .fluid-font {
          font-size: clamp(2rem, 5vw, 4rem); /* Hero text */
          font-family: 'Roboto', sans-serif;
          font-weight: 700;
        }
      
        .fluid-subtext {
          font-size: clamp(1rem, 2.5vw, 1.5rem); /* Tagline */
          color: rgb(11, 21, 8);
        }
      
        .fluid-heading {
          font-size: clamp(1.6rem, 4vw, 2.5rem); /* Section Headings */
          font-weight: 600;
          font-family: 'Roboto', sans-serif;
        }
      
        .fluid-subheading {
          font-size: clamp(1rem, 2vw, 1.3rem); /* Section Subheadings */
          color: #ffffff;
          font-family: 'Roboto', sans-serif;
        }
      
        .fluid-register {
          font-size: clamp(0.9rem, 1.5vw, 1.1rem);
          color: #198754;
        }
      </style>
</head>
<body>
    <div class="container-fluid">
        
      
        <div class="row p-5 shadow rounded-4 justify-content-center mt-5" style="background: linear-gradient(45deg, rgba(204, 94, 210, 0.547),rgb(225, 46, 234), rgba(238, 182, 245, 0.235));">
          <h1 class="text-center fluid-font">
            <span style="color:rgb(240, 240, 240);"> Welcome to</span> <span style="font-size:4rem;font-style: italic; color:rgb(255, 255, 255);text-shadow:2px 2px #050505;">TalentMesh</span>
          </h1>
          <h5 class="text-center mt-2 fluid-subtext">➡️ <span style="color:rgb(240, 240, 240);">where Talent finds its true Destination!</span></h5>
        </div>
      </div>
      
      <div class="container">
        <div class="row mt-5 g-4 justify-content-between">
          <h3 class="text-center mb-4 fluid-heading" style="color: #ffffff;">Explore...</h3>
      
          <div class="col-sm-5 shadow-lg rounded-3 border bg-bright  p-4 text-center">
            <h2 class=" fluid-heading"  style="color:rgb(15, 188, 50)">Destination Seeker</h2>
            <h5 class="fluid-subheading">(Job Seeker)</h5>
            <div >  <a href="user_registration.php" class="btn mt-3" style="background-color: slateblue;color: white;">Register</a></div>
            <a href="login_user.php" class="btn  mt-3" style="background-color: slateblue;color: white;">Login</a>
          </div>
      
          <div class="col-sm-2"></div>
      
          <div class="col-sm-5 shadow-lg rounded-3 border bg-bright p-4 text-center">
            <h2 class="text-shadow fluid-heading" style="color:rgb(15, 188, 50)">Talent Seeker</h2>
            <h5 class="fluid-subheading mb-2">(Job Provider)</h5>
          <div class="mt-2">  <a href="employer_registration.php" class="btn mt-3" style="background-color: slateblue;color: white;">Register</a></div>
            <a href="login_employer.php" class="btn  mt-3" style="background-color: slateblue;color: white;">Login</a>
          </div>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <div class="col-sm-6 mt-5 text-center d-grid" style="color:grey">&copy; 2025 Arunima Paunikar. All rights reserved.</p></div>
     
      </div>
      
      
</body>
</html>