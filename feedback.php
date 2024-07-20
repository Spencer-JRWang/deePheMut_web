<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>APMA Run Module</title>
    <link rel="icon" href="figure/web_icon.ico" type="image/x-icon">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-image: url('figure/5uvJN.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            transition: background-image 0.5s ease-in-out;
        }
        .container {
            align-items: center;
            display: flex;
            justify-content: center;
            background-color: transparent;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
            width: 800px;
            height: 600px;
            background-color: #ffffff;
            padding: 10px 30px 40px;
            transition: background-color 0.5s ease-in-out;
        }
        .card h3 {
            font-size: 22px;
            font-weight: 600;
        }
        .drop_box_submit {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: none;
            border-radius: 5px;
        }
        .btn_change_theme {
  position: absolute;
  top: 50px;
  right: 10px;
  text-decoration: none;
  background-color: #1f77b4;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  outline: none;
  transition: 0.3s;
}
.btn_change_theme:hover {
  text-decoration: none;
  background-color: #ffffff;
  color: #1f77b4;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
        .btn_submit {
            text-decoration: none;
            background-color: rgba(138, 38, 31, 0.9);
            color: #ffffff;
            padding: 10px 50px;
            border: none;
            outline: none;
            transition: 0.3s;
            font-size: 12px;
        }
        .btn_submit:hover {
            text-decoration: none;
            background-color: #ffffff;
            color: rgba(138, 38, 31, 0.9);
            padding: 10px 20px;
            border: none;
            outline: 1px solid #010101;
        }
        .form input {
            margin: 10px 0;
            width: 100%;
            background-color: #e2e2e2;
            border: none;
            outline: none;
            padding: 12px 20px;
            border-radius: 4px;
        }
        .search-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }
        .mutation-input {
            width: 100%;
            height: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }
        .footer {
            position: relative;
            background-color: transparent;
            color: black;
            text-align: center;
            width: 100%;
            bottom: 0;
            font-size: 12px;
            
        }
        .imageContainer {
            position: relative;
            transition: transform 3s ease;
            top: 0;
            left: 0;
            background-color: transparent;
        }
        a {
            text-decoration: none;
            color: #5dabff;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3;
        }
        .dark-theme {
            background-image: url('figure/6193479.jpg');
        }
  .dark-theme .card {
      background-color: #444;
      color: #fff;
  }
  .dark-theme .btn {
      background-color: #555;
      color: #fff;
  }
  .dark-theme h4 {
      color: #fff;
  }
  .dark-theme .btn:hover {
      background-color: #666;
      color: #fff;
  }
  .dark-theme .btn_change_theme {
      background-color: #555;
      color: #fff;
  }
  .dark-theme .btn_change_theme:hover {
      background-color: #fff;
      color: #666;
  }
  .dark-theme .footer {
      color: #fff;
  }
  .dark-theme .menu a{
      background-color: #555;
      color: #fff;
      border: #fff;
  }
  .dark-theme .menu a:hover{
      background-color: #fff;
      color: #555;
      border: #555;
  }
  .menu {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    gap: 10px;
  }
  .menu a {
    color: #fff;
    text-decoration: none;
    padding: 10px 15px;
    background-color: #1f77b4;
    border: 1px solid #1f77b4;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
  }
  .menu a:hover {
    background-color: #fff;
    color: #1f77b4;
  }
    </style>
</head>

<div class="menu">
    <a href="index.php">HOME</a>
    <a href="run.php">RUN</a>
    <a href="guide.html">GUIDE</a>
    <a href="feedback.php">FEEDBACK</a>
    <button class="btn_change_theme" id="toggleBackgroundBtn">Change Theme</button>
</div>

<img src="figure/logo-transparent-png.png" width="360" class="imageContainer"/>
</br>
</br>
</br>
</br>
<div class="container">
    <div class="card">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h3>*Email</h3>
            <input type = 'text' id = 'feedback_email' class = 'search-input' required></text>
            </br>
            <h3>*Topic</h3>
            <input type = 'text' id = 'feedback_topic' class = 'search-input' required></text>
            </br>
            <h3>*Content</h3>
            <textarea type="text" id="feedback_content" class="mutation-input" required placeholder="Please describe your issue"></textarea>
            </br>
            </br>
            <div class="drop_box_submit">
                <button class="btn_submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('toggleBackgroundBtn').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
    });
</script>
</br>
<div class="footer">
    <!-- 底部内容 -->
    Department of Bioinformatics,
    Medical School of Soochow University <br>
    Contact: <a href="mailto:spencer-jrwang@foxmail.com">spencer-jrwang@foxmail.com</a><br>
    Source Code: <a href="https://github.com/Spencer-JRWang/APMA">Github</a>
</div>

</body>
</html>

