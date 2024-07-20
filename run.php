<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>deePheMut Run Module</title>
    <link rel="icon" href="figure/web_icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/run.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 2px solid black;
            z-index: 1000;
        }
        #popup-background {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }
</style>
</head>
<body onload="fetchStatus()">

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
    <h4>Server Status: <span id="status">...Connecting...</span></h4>
        <div class="clock" id="clock"></div>
        <hr>
        <h3>Structure PDB File</h3>
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="drop_box">
                    <h4>UniProt ID(We will automatically get AlphaFold's structure file):</h4>
                    <input type='text' id='uniprot_ID' name='uniprot_ID' class='search-input' placeholder='P60484' required>
                        <header>
                            <h4>Or Upload Your Protein Structure File Here</h4>
                        </header>
                        <p>File Supported: pdb, needs to have a complete sequence</p>
                        <input type="file" hidden accept=".pdb" id="fileID1" style="display:none;" name="file1" onchange="updateFileName('fileID1', 'fileName1')">
                        <button class="btn" id='PDB_submit_btn' type="button" onclick="document.getElementById('fileID1').click()" disabled>Choose File</button>

                        <script>
                            const textInput = document.getElementById('uniprot_ID');
                            const submitButton = document.getElementById('PDB_submit_btn');
                            const fileInput = document.getElementById('fileID1');

                            textInput.addEventListener('input', function() {
                                if (textInput.value.trim() !== '') {
                                    submitButton.disabled = true;
                                } else {
                                    submitButton.disabled = false;
                                }
                            });

                            fileInput.addEventListener('change', function() {
                                if (fileInput.files.length > 0) {
                                    textInput.disabled = true;
                                    textInput.value = '';
                                    submitButton.disabled = false;
                                } else {
                                    textInput.disabled = false;
                                }
                            });

                            // 初始化按钮和输入框状态
                            if (textInput.value.trim() !== '') {
                                submitButton.disabled = true;
                            } else {
                                submitButton.disabled = false;
                            }

                            if (fileInput.files.length > 0) {
                                textInput.disabled = true;
                            } else {
                                textInput.disabled = false;
                            }
                        </script>

                <span id="fileName1"></span>
            </div>
            </br>
            <h3>Protein Mutations</h3>
            <div class="drop_box">
                <header>
                    <h4>Record Your Mutations Here</h4>
                </header>
                <p>Seperate Category And Mutation With Tab(\t)</p>
                <textarea type="text" id="mutations" name="mutationstring" class="mutation-input" required placeholder="ASD     M1V"></textarea>
            </div>
            </br>
            <h3>Email</h3>
            <div class="drop_box">
                <header>
                    <h4>Give Us Your Email</h4>
                </header>
                <p>You'll Be Notified When Results Are Ready</p>
                <input type="text" id="searchStringAlphafold" name="searchString" class="search-input" required placeholder="spencerwwwwww@gmail.com">
            </div>
            </br>
            <div class="drop_box_submit">
            <button class="btn_submit" type="button" onclick="uploadFile(event)">Submit</button>
            </div>
        </form>
    </div>

    <div id="popup-background"></div>
    <div id="popup">
        <div id="popup-content"></div>
        <button onclick="closePopup()" class = 'btn'>Close</button>
    </div>

    <script>
        function uploadFile(event) {
            event.preventDefault();
            let formData = new FormData(document.getElementById('uploadForm'));

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    showPopup(xhr.responseText);
                } else {
                    showPopup('An error occurred while uploading the file.');
                }
            };
            xhr.send(formData);
        }

        function showPopup(content) {
            document.getElementById('popup-content').innerHTML = content;
            document.getElementById('popup-background').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup-background').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
            location.reload();
        }
    </script>

</div>
<br/>
<br/>
<br/>
<br/>
<div class="footer">
    <!-- 底部内容 -->
    Department of Bioinformatics,
    Medical School of Soochow University <br>
    Contact: <a href="mailto:spencer-jrwang@foxmail.com">spencer-jrwang@foxmail.com</a><br>
    Source Code: <a href="https://github.com/Spencer-JRWang/APMA">Github</a>
</div>
<br/>
<script>
    // 1. Show a welcome message when the homepage opens.
    window.onload = function() {
        // alert('Welcome to SUDA APMA Server!');
        startClock();
    };

    // 3. Change the color of any paragraph text when it is clicked.
    document.querySelectorAll('p').forEach(function(p) {
        p.addEventListener('click', function() {
            p.style.color = p.style.color === 'blue' ? '#a3a3a3' : 'blue';
        });
    });

    // 4. Add a button to toggle the background theme of the homepage.
    document.getElementById('toggleBackgroundBtn').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
    });

    // 5. Add a clock to the homepage that displays the current date and time.
    function startClock() {
        setInterval(() => {
            const now = new Date();
            const formattedTime = now.toLocaleString();
            document.getElementById('clock').textContent = formattedTime;
        });
    }

    function updateFileName(inputId, outputId) {
        var fileNameElement = document.getElementById(outputId);
        var fileInput = document.getElementById(inputId);
        var file = fileInput.files[0];
        fileNameElement.textContent = file ? file.name : '';
    }

    // 6. AJAX fetch status
    function fetchStatus() {
            fetch('upload.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('status').innerText = data.status;
                })
                .catch(error => console.error('Error fetching status:', error));
        }

        setInterval(fetchStatus, 3000); // 每3秒更新一次状态
</script>
</body>
</html>

