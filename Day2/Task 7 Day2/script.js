    function calculateGrade() {
      const grade = parseFloat(document.getElementById("gradeInput").value);
      const resultDiv = document.getElementById("result");

      let message = "";
      let cssClass = "";

      if (grade >= 90) {
        message = "ممتاز";
        cssClass = "excellent";
      } else if (grade >= 80) {
        message = "جيد جدًا";
        cssClass = "very-good";
      } else if (grade >= 70) {
        message = "جيد";
        cssClass = "good";
      } else if (grade >= 60) {
        message = "ضعيف";
        cssClass = "weak";
      }
      else {
        message = "راسب";
        cssClass = "fail";
      }

      resultDiv.textContent = "تقديرك: " + message;
      resultDiv.className = "result " + cssClass;
    }