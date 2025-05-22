<!DOCTYPE html>
<html lang="en">
    <!-- style for header start -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="responsive.css">
    <!-- style for header end -->

  <style>
    
    body {  

    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin:50 50 50 50;
    display:block;
    padding: 20px;
  }
  
  .container {
    max-width: 600px;
    margin: 70px auto auto auto;
    background: white;
    padding:40px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  
  h1, h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .semester {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
  }
  
  .semester h3 {
    margin-bottom: 10px;
  }
  
  .subject-row {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
  }
  
  .subject-row input,
  .subject-row select {
    flex: 1 1 33%; /* Take up 1/3 of the row */
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
  }
  
  .subject-row input::placeholder {
    color: #aaa;
  }
  
  .subject-row button {
    flex: 0 0 auto;
    background-color: #810c0c;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .subject-row button:hover {
    background-color: #810c0c;
  }
  
  .add-button, .remove-button {
    background-color: #861414;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }
  
  .add-button:hover, .remove-button:hover {
    background-color: #810c0c;
  }
  
  .gpa {
    margin: 10px 0;
    font-weight: bold;
  }
  
  #add-semester {
    display: block;
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    background-color: #810c0c;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }
  
  #add-semester:hover {
    background-color: #810c0c;
  }
  
  h2 span {
    color: #8b1313;
    font-weight: bold;
  }
  
  /* Responsive styles */
  @media (max-width: 768px) {
    .subject-row {
      flex-direction: column; /* Stack items vertically on smaller screens */
      gap: 5px;
    }
  
    .subject-row input,
    .subject-row select,
    .subject-row button {
      flex: 1 1 100%; /* Make inputs full width */
    }
  
    #add-semester {
      font-size: 14px;
    }
  }
  
  @media (max-width: 480px) {
    .container {
      padding: 15px;
    }
  
    h1, h2 {
      font-size: 18px;
    }
  
    #add-semester {
      font-size: 14px;
      padding: 8px;
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

  </style>




<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CGPA Calculator</title>
  <!-- <link rel="stylesheet" href="cgCal.css"> -->
</head>

<body>
    <!-- add header section  -->
    <?php include 'header.php'; ?>

  <div class="container">
    <h1>CGPA Calculator for CSE/EEE/CE</h1>
    <div id="semesters">
      <!-- Semester blocks will be dynamically added here -->
    </div>
    <button id="add-semester">Add Next Semester</button>
    <h2>Your CGPA: <span id="cgpa">0.00</span></h2>
  </div>



  <!-- <script src="cgCal.js"></script> -->

  <!-- javascript start -->

  <script>
    const semestersContainer = document.getElementById("semesters");
const addSemesterButton = document.getElementById("add-semester");
const cgpaDisplay = document.getElementById("cgpa");

let semesterCount = 0;

// Function to calculate CGPA
function calculateCGPA() {
  let totalGpa = 0;
  let totalCredits = 0;

  const semesterGPAs = document.querySelectorAll(".semester-gpa");
  semesterGPAs.forEach((gpaElement) => {
    const gpa = parseFloat(gpaElement.textContent);
    const credits = parseInt(gpaElement.getAttribute("data-credits"));
    if (!isNaN(gpa) && !isNaN(credits)) {
      totalGpa += gpa * credits;
      totalCredits += credits;
    }
  });

  const cgpa = totalCredits > 0 ? (totalGpa / totalCredits).toFixed(2) : "0.00";
  cgpaDisplay.textContent = cgpa;
}

// Function to calculate GPA for a semester
function calculateSemesterGPA(semesterId) {
  const semester = document.getElementById(semesterId);
  const subjects = semester.querySelectorAll(".subject-row");
  let totalGradePoints = 0;
  let totalCredits = 0;

  subjects.forEach((subject) => {
    const grade = subject.querySelector(".grade").value;
    const credits = parseFloat(subject.querySelector(".credits").value);
    const gradePoints = {
      "A+": 4.0,
      A: 4.0,
      "A-": 3.7,
      "B+": 3.3,
      B: 3.0,
      "B-": 2.7,
      "C+": 2.3,
      C: 2.0,
      "C-": 1.7,
      D: 1.0,
      F: 0.0,
    };

    if (gradePoints[grade] !== undefined && !isNaN(credits)) {
      totalGradePoints += gradePoints[grade] * credits;
      totalCredits += credits;
    }
  });

  const gpa = totalCredits > 0 ? (totalGradePoints / totalCredits).toFixed(2) : "0.00";
  semester.querySelector(".semester-gpa").textContent = gpa;
  semester.querySelector(".semester-gpa").setAttribute("data-credits", totalCredits);

  calculateCGPA();
}

// Function to add a new semester
function addSemester() {
  semesterCount++;
  const semesterId = `semester-${semesterCount}`;
  const semesterHTML = `
    <div class="semester" id="${semesterId}">
      <h3>Semester ${semesterCount}</h3>
      <div class="subjects">
        <div class="subject-row">
          <input type="text" class="subject-name" placeholder="Subject Name">
          <select class="grade">
            <option value="">Grade</option>
            <option value="A+">A+</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B">B</option>
            <option value="B-">B-</option>
            <option value="C+">C+</option>
            <option value="C">C</option>
            <option value="C-">C-</option>
            <option value="D">D</option>
            <option value="F">F</option>
          </select>
          <input type="number" class="credits" placeholder="Credits">
          <button class="remove-subject">Remove</button>
        </div>
      </div>
      <p class="gpa">Semester GPA: <span class="semester-gpa" data-credits="0">0.00</span></p>
      <button class="add-subject">Add Subject</button>
      <button class="remove-semester">Remove Semester</button>
    </div>
  `;

  semestersContainer.insertAdjacentHTML("beforeend", semesterHTML);

  const semester = document.getElementById(semesterId);

  // Calculate GPA when inputs change
  semester.addEventListener("input", () => calculateSemesterGPA(semesterId));

  // Add subject
  semester.querySelector(".add-subject").addEventListener("click", () => {
    const subjectRowHTML = `
      <div class="subject-row">
        <input type="text" class="subject-name" placeholder="Subject Name">
        <select class="grade">
          <option value="">Grade</option>
          <option value="A+">A+</option>
          <option value="A">A</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B">B</option>
          <option value="B-">B-</option>
          <option value="C+">C+</option>
          <option value="C">C</option>
          <option value="C-">C-</option>
          <option value="D">D</option>
          <option value="F">F</option>
        </select>
        <input type="number" class="credits" placeholder="Credits">
        <button class="remove-subject">Remove</button>
      </div>
    `;

    semester.querySelector(".subjects").insertAdjacentHTML("beforeend", subjectRowHTML);
  });

  // Remove semester
  semester.querySelector(".remove-semester").addEventListener("click", () => {
    semester.remove();
    calculateCGPA();
  });

  // Use event delegation for "Remove Subject"
  semester.querySelector(".subjects").addEventListener("click", (e) => {
    if (e.target.classList.contains("remove-subject")) {
      e.target.parentElement.remove();
      calculateSemesterGPA(semesterId);
    }
  });
}

// Initialize
addSemesterButton.addEventListener("click", addSemester);

  </script>
</body>
</html>
