<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ternary Arsenal</title>
  <style>
    body {
      background-color: #1a0000;
      background-image: url("https://res.cloudinary.com/dtjflvikd/image/upload/v1751929713/War-Torn_Battlefield_Under_Fiery_Skies_rmkck1.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      font-family: 'Georgia', serif;
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
      background-color: rgb(106, 41, 6);
      color: #fff8dc;
    }

    .switzerland-info {
      color: #fff8dc;
      padding: 60px 30px 30px;
      text-align: center;
      margin-top: 20vh;
    }

    .switzerland-info img {
      width: 300px;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .switzerland-info img:hover {
      transform: scale(1.05);
    }

    .image-gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    .centered-text {
      color: #fff8dc;
      text-align: center;
      font-size: 2rem;
      line-height: 1.5;
      white-space: pre-line;
      margin-top: 5vh;
    }

    .typing {
      border-right: .15em solid white;
      animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: white; }
    }
  </style>
</head>
<body>

  <div class="top-buttons">
    <a href="/register" class="btn">Register</a>
    <a href="/login" class="btn">Log in</a>
  </div>

  <div class="switzerland-info">
    <h1 style="font-size: 3rem;">Welcome to Ternary Arsenal</h1>
    <h2 style="margin-top: 10px; font-style: italic;">"Land of Mountains, and Innovation"</h2>

       <div class="centered-text" id="text"></div>

    <div class="image-gallery">
      <img src="https://res.cloudinary.com/dbqhwou20/image/upload/v1751992216/TarihteBug%C3%BCn_6_A%C4%9Fustos_1945__ABD_Hiro%C5%9Fima_ya_vpojuw.jpg" alt="Chillon Castle">
      <img src="https://res.cloudinary.com/dbqhwou20/image/upload/v1751992215/0f17dcd1-c050-4485-9da9-4fcd5e0411d5_vg6tuw.jpg" alt="Zermatt and Matterhorn">
      <img src="https://res.cloudinary.com/dbqhwou20/image/upload/v1751992215/%D8%B3%D9%84%D8%A7%D8%AD_%D9%82%D8%AF%D9%8A%D9%85_gd88eq.jpg" alt="Bern Old Town">
    </div>

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
  </script>

</body>
</html>
