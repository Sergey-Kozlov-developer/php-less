<?php

function resize($source_image_path, $resized_image_path, $resize)
{

    // Проверка на существование файла
    if (!file_exists($source_image_path)) {
        return false;
    }

    // Проверка на размер изображения
    if (!getimagesize($source_image_path)) {
        return false;
    }

    // Путь к исходному изображению
    $source_path = $source_image_path;

    // Создаем переменные с шириной, выстой и типо исходного изображения
    list($source_width, $source_height, $source_type) = getimagesize($source_path);

    // Создаем "виртуальную" копию исходного изображения
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }

    /*
    * Высчитываем размер результрующего (отмастабированного) изображения
    */
    // Определяем что больше ширна или высота
    if ($source_width > $source_height) {
        $result_width = $resize;
        $result_height = $resize / $source_width * $source_height; // 460
    } else {
        $result_height = $resize;
        $result_width = $resize / $source_height * $source_width;
    }

    /*
    * Ресайз изображения в временный виртуальный холст $temp_gdim
    */
    $temp_gdim = imagecreatetruecolor($result_width, $result_height);

    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $result_width,
        $result_height,
        $source_width,
        $source_height
    );

    /*
    * Сохраняем изображение из виртуального результрующего холста $temp_gdim по адресу $resized_image_path
    */
    imagejpeg($temp_gdim, $resized_image_path, 90);
    imagedestroy($source_gdim);
    imagedestroy($temp_gdim);
    return true;
}
