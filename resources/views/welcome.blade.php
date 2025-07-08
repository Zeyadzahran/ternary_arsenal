<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ternary Arsenal</title>
  <style>
    /* body {
  background-image: url("https://res.cloudinary.com/dtjflvikd/image/upload/v1751929713/War-Torn_Battlefield_Under_Fiery_Skies_rmkck1.png");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
} */
body {
  background-color: #1a0000; /* لون احتياطي لما الصورة متظهرش */
  background-image: url("https://res.cloudinary.com/dtjflvikd/image/upload/v1751929713/War-Torn_Battlefield_Under_Fiery_Skies_rmkck1.png");
  background-size: cover;         /* تخلي الصورة تغطي كل الصفحة */
  background-position: center;    /* تتمركز كويس */
  background-repeat: no-repeat;   /* متتكررش */
  min-height: 100vh;              /* تأكد إن الصفحة بطول الشاشة */
  display: flex;
  flex-direction: column;
}
    /* body {
      margin: 0;
      padding: 0;
      background: black;
      overflow: hidden;
      height: 100vh;
      font-family: 'Georgia', serif;
      position: relative;
    }

    .star {
      position: absolute;
      width: 2px;
      height: 2px;
      background: white;
      border-radius: 50%;
      opacity: 0.8;
      animation: twinkle 2s infinite;
    }

    @keyframes twinkle {
      0%, 100% { opacity: 0.8; }
      50% { opacity: 0.2; }
    } */

    .centered-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff8dc;
      text-align: center;
      font-size: 2.5rem;
      z-index: 1;
      line-height: 1.5;
      padding: 0 1rem;
      white-space: pre-line;
    }

    .typing {
      border-right: .15em solid white;
      animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: white; }
    }
    .top-buttons {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 2;
    display: flex;
    gap: 10px;
  }

  .btn {
    text-decoration: none;
    padding: 10px 20px;
    border: 1px solid #fff8dc;
    color: #fff8dc;
    background-color: transparent;
    border-radius: 5px;
    font-size: 1rem;
    transition: all 0.3s ease;
  }

  .btn:hover {
    background-color:rgb(106, 41, 6);
    color: #fff8dc;
  }
  </style>
</head>
<body>


    <div class="centered-text" id="text"></div>

    <div class="top-buttons">
      <a href="/register" class="btn">Register</a>
      <a href="/login" class="btn">Log in</a>
    </div>
    <script>
      const lines = [
        "We Will Win!",
        "We Will Win!",
        "We Will Win!"
      ];

      const textElement = document.getElementById("text");
      let lineIndex = 0;
      let charIndex = 0;

      function typeLine() {
        if (lineIndex < lines.length) {
          const currentLine = lines[lineIndex];
          const span = document.createElement("span");
          span.classList.add("typing");
          textElement.appendChild(span);

          function typeChar() {
            if (charIndex < currentLine.length) {
              span.textContent += currentLine.charAt(charIndex);
              charIndex++;
              setTimeout(typeChar, 80);
            } else {
              span.classList.remove("typing");
              charIndex = 0;
              lineIndex++;
              textElement.innerHTML += "\n";
              setTimeout(typeLine, 300);
            }
          }

          typeChar();
        }
      }

      typeLine();

      const numStars = 500;
      for (let i = 0; i < numStars; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.top = `${Math.random() * 100}%`;
        star.style.left = `${Math.random() * 100}%`;
        star.style.animationDuration = `${1 + Math.random() * 2}s`;
        star.style.opacity = `${0.3 + Math.random() * 0.7}`;
        document.body.appendChild(star);
      }
    </script>

</body>
</html>


