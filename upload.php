<?php
// 定义文件路径
$countFile = '/home/wangjingran/APMA/run_count.txt';
$lockFile = '/home/wangjingran/APMA/run.lock';

// 创建计数器文件和队列文件（如果不存在）
if (!file_exists($countFile)) {
    file_put_contents($countFile, '0');
}

// 检查文件锁状态
$fp = fopen($lockFile, 'c+');
if (!flock($fp, LOCK_EX | LOCK_NB)) {
    $status = "...BUSY...";
} else {
    $status = "IDLE";
    // 释放文件锁
    flock($fp, LOCK_UN);
}
fclose($fp);

// 如果是上传请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 获取文件锁以防止并发运行
    $fp = fopen($lockFile, 'c+');

    // 如果无法获得文件锁，则继续排队
    if (!flock($fp, LOCK_EX | LOCK_NB)) {
        echo "...A process is already running. Please wait...";
        exit;
    }

    // 读取当前的计数器值
    $runCount = (int) file_get_contents($countFile);

    // 增加计数器值
    $runCount++;

    // 将新的计数器值写回文件
    file_put_contents($countFile, (string) $runCount);

    // 检查并处理上传文件错误
    function checkUploadError($file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Error while uploading " . $file['name'];
            exit;
        }
    }

    // 移动上传文件到目标目录
    function moveUploadedFile($file, $uploadDir) {
        $fileName = basename($file['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "...{$fileName} uploading... success";
            echo "</br>";
        } else {
            echo "Error while uploading {$fileName}";
            exit;
        }
    }

    // 设置目标文件路径
    $uploadDir = '/home/wangjingran/APMA/data/';

    // 处理 uniprot_ID 或上传的PDB文件
    if (isset($_POST['uniprot_ID']) && !empty($_POST['uniprot_ID'])) {
        // 处理 uniprot_ID
        $uniprotId = str_replace("\r", "", $_POST['uniprot_ID']);
        $uniprotIdFile = $uploadDir . 'uniprot_ID.txt';
        file_put_contents($uniprotIdFile, $uniprotId . PHP_EOL, FILE_APPEND);
        echo "...recording UniProt ID... success";
        echo "</br>";
    } elseif (isset($_FILES['file1'])) {
        // 处理上传的PDB文件
        checkUploadError($_FILES['file1']);
        moveUploadedFile($_FILES['file1'], $uploadDir);
    } else {
        echo "No valid uniprot_ID or PDB file uploaded";
        exit;
    }

    // 处理突变信息
    if (isset($_POST['mutationstring']) && !empty($_POST['mutationstring'])) {
        $mutation = str_replace("\r", "", $_POST['mutationstring']);
        $mutationFile = $uploadDir . 'position.txt';
        file_put_contents($mutationFile, $mutation . PHP_EOL, FILE_APPEND);
        echo "...recording mutations... success";
        echo "</br>";
    } else {
        echo "Invalid mutations";
        exit;
    }

    // 处理邮箱地址
    if (isset($_POST['searchString']) && filter_var($_POST['searchString'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['searchString'];
        $emailFile = $uploadDir . 'email.txt';
        file_put_contents($emailFile, $email . PHP_EOL, FILE_APPEND);
        echo "...recording email... success";
        echo "</br>";
    } else {
        echo "Invalid email address/n";
        exit;
    }

    // 运行Python脚本
    $output = shell_exec('nohup /home/wangjingran/miniconda3/envs/APMA/bin/python /home/wangjingran/APMA/Run.py > /home/wangjingran/APMA/run.txt &');
    echo "<h3>Uploading files success, deePheMut is running now</h3>";
    echo "<h3>Please pay attention to your email</h3>";
    echo "</br>";

} else {
    // 返回状态信息
    header('Content-Type: application/json');
    echo json_encode([
        'status' => $status
    ]);
}
?>
