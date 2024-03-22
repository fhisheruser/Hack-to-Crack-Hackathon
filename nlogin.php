<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React App</title>
    <link rel="icon" type="image" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Ficonscout.com%2Ffree-icon%2Freact-1&psig=AOvVaw0qi8xlXVlnACdzC5n_1JD5&ust=1711099685821000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNjp3pmFhYUDFQAAAAAdAAAAABAJ" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('Logo.png'); /* Replace 'background.jpg' with your image path */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            opacity: 0.7;
            
        }
       
  
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border: 5px solid rgb(0, 0, 0);
            border-radius: 10px;
            /* opacity: 0.7 ; */
        }
        h2 {
            text-align: center;
            border-bottom: 2px solid rgb(0, 0, 0);
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
        }
        form {
            width: 70%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: rgb(0, 0, 0);
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.819);
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(0, 0, 0);
        }
        
        textarea{
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="header">
        
    <div class="container">
        <h2>Nurse Signup</h2>
        <form action="#" method="POST">
            <label for="fname"><b>First Name:</b></label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname"><b>Last Name</b>:</label>
            <input type="text" id="lname" name="lname" required>

            <label for="mobile"><b>Mobile No.:</b></label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="email"><b>Email Address:</b></label>
            <input type="email" id="email" name="email" required>

            

            <label for="experience"><b>Experience:</b></label>
            <input type="text" id="number" name="Experience" required>

            <label for="specialization"><b>specialization</b></label>
            <select id="specialization" name="specialization">
             <option value="specialization">Select Your specialization</option>
             <option value="specialization">Pediatric Nursing</option>
             <option value="specialization">Critical Care Nursing</option>
             <option value="specialization">Maternal Health Nursing</option>
             <option value="specialization">Geriatric Nursing</option>
             <option value="specialization">Psychiatric-Mental Health Nursing</option>
             <option value="specialization">Oncology Nursing</option>
             <option value="specialization">Community Health Nursing</option>
             <option value="specialization">Orthopedic Nursing</option>
             <option value="specialization">Neonatal Nursing</option>
             <option value="specialization">Nurse Anesthetist</option>
            </select>
             

             <label for="gender"><b>Gender:</b></label>
            <select id="gender" name="gender">
                <option value="Gender">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>

            <label for="state"><b>State:</b></label>
            <select id="state" name="state">
                <option value="state">Select State</option>
                <option value="state1">Maharastra</option>
                <option value="state2">Punajb</option>
                <option value="state3">Delhi</option>
               
            </select>

            <label for="city"><b>City:</b></label>
            <select id="city" name="city">
                <option value="city">Select City</option>
                <option value="city1">Mumbai</option>
                <option value="city2">Thane</option>
                <option value="city3">Nashik</option>
                
            </select>

            <label for="address"><b>Address:</b></label>
            
            <textarea id="address" name="address" rows="4" required ></textarea><br><br>


            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
