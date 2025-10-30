<?php
// 定义目录路径，假设脚本位于需要操作的目录的下一级
$directory = "../ids/";

// 检查目录是否存在
if (!is_dir($directory)) {
    echo "目录不存在";
    exit;
}

// 打开目录
$dirHandle = opendir($directory);
if (!$dirHandle) {
    echo "无法打开目录";
    exit;
}

// 遍历目录中的文件
while (false !== ($filename = readdir($dirHandle))) {
    if ($filename != "." && $filename != "..") {
        $filePath = $directory . $filename;

        // 检查是否为文件，避免删除子目录
        if (is_file($filePath)) {
            if (unlink($filePath)) {
                echo "成功删除文件: $filename\n";
            } else {
                echo "删除文件失败: $filename\n";
            }
        }
    }
}

// 关闭目录句柄
closedir($dirHandle);
?>
