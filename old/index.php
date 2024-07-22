<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="graph promoting, amino acid Network, Network Proteomics, dynamics network, machine learning">
  <title>deePheMut</title>
  
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
    body {
            background-image: url('figure/5uvJN.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            transition: background-image 0.5s ease-in-out;
        }
    .container_box {
        width: 100%;
        align-items: center;
        display: flex;
        justify-content: center;
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
  .footer {
            position: relative;
            background-color: transparent;
            color: black;
            text-align: center;
            width: 100%;
            bottom: 0;
            font-size: 12px;
            
        }
  .container {
      display: flex;
      justify-content: space-between;
  }
  .imageContainerr {
            position: relative;
            top: 0;
            left: 0;
            background-color: transparent;
        }

  .card {
      display: flex;
      border-radius: 10px;
      box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
      width: 1500px;
      height: 700px;
      background-color: #ffffff;
      padding: 10px 30px 40px;
      transition: background-color 0.5s ease-in-out;
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
  .card .image {
    flex: 0 0 50%; /* 固定图像部分为 50% */
    padding: 5px;
}

.card .image img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: contain;
}

.card .content {
    flex: 0 0 50%; /* 固定文字部分为 50% */
    padding: 5px 10px;
    display: flex;
    flex-direction: column;
}

.card .content h2 {
    margin-top: 0;
    text-align: center;
}

.card .content p {
    margin-top: 10px;
    line-height: 1.6;
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
  </style>
</head>


<body">

    <img src="figure/logo-transparent-png.png" width="360" class="imageContainerr"/>


  <div id="container_a" style="height: 80%">
    <script type="text/javascript" src="https://registry.npmmirror.com/echarts/5.5.0/files/dist/echarts.min.js"></script>
    <script type="text/javascript">
      var dom = document.getElementById('container_a');
      var myChart = echarts.init(dom, null, {
        renderer: 'canvas',
        useDirtyRect: false
      });
      var app = {};
      
      var option;

      option = {
    graphic: {
      elements: [
        {
          type: 'text',
          right: 'center',
          top: '10%',
          style: {
            text: 'deePheMut',
            fontSize: 65,
            fontWeight: 'bold',
            lineDash: [0, 150],
            lineDashOffset: 0,
            fill: 'transparent',
            stroke: '#1f77b4',
            lineWidth: 1
          },
          keyframeAnimation: {
            duration: 7000,
            loop: true,
            keyframes: [
              {
                percent: 0.7,
                style: {
                  fill: 'transparent',
                  lineDashOffset: 200,
                  lineDash: [200, 0]
                }
              },
              {
                // Stop for a while.
                percent: 0.8,
                style: {
                  fill: 'transparent'
                }
              },
              {
                percent: 1,
                style: {
                  fill: '#1f77b4'
                }
              }
            ]
          }
        }
      ]
    }
  };

      if (option && typeof option === 'object') {
        myChart.setOption(option);
      }

      window.addEventListener('resize', myChart.resize);
    </script>
  </div>
<h4 style="text-align: center;">deep and precise prediction of mutations to different phenotypes</h4>
<br/>


<div class="container_box">
  <div class="card">
    <div class="image">
      <img src="figure/deePheMut.png" alt="Image description">
    </div>
    <div class="content">
      <h2>What is deePheMut?</h2>
      <p>
&nbsp;&nbsp;&nbsp;&nbsp;<strong>deePheMut</strong> is an online server tool for distinguishing and predicting inseparable single gene missense mutation multiphenotypic diseases. We will automatically calculate the phenotypic mutation characteristics and use the machine learning framework for model training and interpretation. The final results will be presented in a visual result. We will provide biological indicators that distinguish different disease phenotypes caused by single gene missense mutations and mutation score results to measure the biological significance of the current mutation in this phenotype.
</br>
</br>
&nbsp;&nbsp;&nbsp;&nbsp;The network properties of our proteins are calculated based on self-developed NACEN, sequence alignment is based on Blast and Clustal Omega, conservative calculation is based on rate4site, mutation energy prediction is based on FoldX5, and dynamic network calculation of proteins is based on ProDy.
</br>
</br>
&nbsp;&nbsp;&nbsp;&nbsp;Users need to submit a full-length structure file (or enter the UniProt ID to obtain the AlphaFold prediction results) and records of mutations and corresponding phenotypes, and the returned results include feature results based on different phenotypes, machine learning results, and corresponding mutation scores.
</br>
</br>
&nbsp;&nbsp;&nbsp;&nbsp;Due to the long resource calculation, our Server will prevent other users from submitting files while the Status is running. Please note the Server Status of the Run module. deePheMut is free for everyone to use, if you have used our tools in your research, please cite:
      </p>
    </div>
  </div>
</div>



<div class="menu">
    <a href="index.php">HOME</a>
    <a href="run.php">RUN</a>
    <a href="guide.html">GUIDE</a>
    <a href="feedback.php">FEEDBACK</a>
    <button class="btn_change_theme" id="toggleBackgroundBtn">Change Theme</button>
</div>
<script>
    document.getElementById('toggleBackgroundBtn').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
    });
</script>
  </br>
<div class="footer">
  Department of Bioinformatics,
  Medical School of Soochow University <br>
  Contact us: <a href="mailto:spencer-jrwang@foxmail.com">spencer-jrwang@foxmail.com</a><br>
  Source Code: <a href="https://github.com/Spencer-JRWang/APMA">Github</a>
</div>
  </br>
</body>
</html>
