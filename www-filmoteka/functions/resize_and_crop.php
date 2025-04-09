<?php

/**
 * Функция изменяет размер изображения и выполняет его кадрирование (crop).
 *
 * @param string $source_path Путь к исходному изображению.
 * @param string $thumbnail_image_path Путь, куда сохранить миниатюру.
 * @param int $result_width Ширина итогового изображения.
 * @param int $result_height Высота итогового изображения.
 * @return string|false Имя созданного файла или false в случае ошибки.
 */
function resize_and_crop($source_path, $thumbnail_image_path, $result_width, $result_height)
{
	// Проверяем, является ли файл изображением и получаем его параметры
	if (!($image_info = getimagesize($source_path))) {
		return false;
	}
	list($source_width, $source_height, $source_type) = $image_info;

	// Создаем изображение на основе типа файла
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
		case IMAGETYPE_WEBP:
			// Проверяем, поддерживается ли WebP в PHP
			if (!function_exists('imagecreatefromwebp')) {
				die("Ваш PHP не поддерживает WebP. Обновите PHP или включите GD с WebP.");
			}
			$source_gdim = imagecreatefromwebp($source_path);
			break;
		default:
			return false; // Неподдерживаемый формат изображения
	}

	// Проверяем, успешно ли было создано изображение
	if (!$source_gdim) return false;

	// Вычисляем соотношение сторон исходного изображения и желаемого результата
	$source_aspect_ratio = $source_width / $source_height;
	$desired_aspect_ratio = $result_width / $result_height;

	// Рассчитываем размеры временного изображения (подгонка под нужное соотношение сторон)
	if ($source_aspect_ratio > $desired_aspect_ratio) {
		// Исходное изображение шире, чем желаемое соотношение
		$temp_height = $result_height;
		$temp_width = (int) ($result_height * $source_aspect_ratio);
	} else {
		// Исходное изображение выше или равно по соотношению
		$temp_width = $result_width;
		$temp_height = (int) ($result_width / $source_aspect_ratio);
	}

	// Создаем временные изображения с новыми размерами
	$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
	$desired_gdim = imagecreatetruecolor($result_width, $result_height);

	// Если изображение PNG или WebP, сохраняем прозрачность
	if ($source_type === IMAGETYPE_PNG || $source_type === IMAGETYPE_WEBP) {
		imagealphablending($temp_gdim, false);
		imagesavealpha($temp_gdim, true);
		imagealphablending($desired_gdim, false);
		imagesavealpha($desired_gdim, true);
	}

	// Масштабируем исходное изображение, сохраняя пропорции
	imagecopyresampled($temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height);

	// Вычисляем координаты обрезки, чтобы центрировать изображение
	$x0 = (int) round(($temp_width - $result_width) / 2);
	$y0 = (int) round(($temp_height - $result_height) / 2);

	// Кадрируем изображение, копируя центральную область
	imagecopy($desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $result_width, $result_height);

	// Добавляем соответствующее расширение к пути сохранения файла
	switch ($source_type) {
		case IMAGETYPE_GIF:
			$thumbnail_image_path .= '.gif';
			imagegif($desired_gdim, $thumbnail_image_path);
			break;
		case IMAGETYPE_JPEG:
			$thumbnail_image_path .= '.jpg';
			imagejpeg($desired_gdim, $thumbnail_image_path, 90); // 90% качество JPEG
			break;
		case IMAGETYPE_PNG:
			$thumbnail_image_path .= '.png';
			imagepng($desired_gdim, $thumbnail_image_path, 9); // Максимальная компрессия PNG
			break;
		case IMAGETYPE_WEBP:
			$thumbnail_image_path .= '.webp';
			imagewebp($desired_gdim, $thumbnail_image_path, 90); // 90% качество WebP
			break;
	}

	// Освобождаем память, уничтожая временные изображения
	imagedestroy($source_gdim);
	imagedestroy($temp_gdim);
	imagedestroy($desired_gdim);

	// Возвращаем имя созданного файла
	return pathinfo($thumbnail_image_path, PATHINFO_BASENAME);
}

/**
 * Функция изменяет размер изображения и без кадрирования (no crop).
 *
 * @param string $source_path Путь к исходному изображению.
 * @param string $thumbnail_image_path Путь, куда сохранить миниатюру.
 * @param int $result_width Ширина итогового изображения.
 * @param int $result_height Высота итогового изображения.
 * @return string|false Имя созданного файла или false в случае ошибки.
 */
function resize_and_nocrop($source_path, $thumbnail_image_path, $result_width, $result_height)
{
	// Проверяем, является ли файл изображением и получаем его параметры
	if (!($image_info = getimagesize($source_path))) {
		return false;
	}
	list($source_width, $source_height, $source_type) = $image_info;

	// Создаем изображение на основе типа файла
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
		case IMAGETYPE_WEBP:
			// Проверяем, поддерживается ли WebP в PHP
			if (!function_exists('imagecreatefromwebp')) {
				die("Ваш PHP не поддерживает WebP. Обновите PHP или включите GD с WebP.");
			}
			$source_gdim = imagecreatefromwebp($source_path);
			break;
		default:
			return false; // Неподдерживаемый формат изображения
	}

	// Проверяем, успешно ли было создано изображение
	if (!$source_gdim) return false;

	// Вычисляем соотношение сторон исходного изображения и желаемого результата
	$source_aspect_ratio = $source_width / $source_height;
	$desired_aspect_ratio = $result_width / $result_height;

	// Рассчитываем размеры временного изображения (подгонка под нужное соотношение сторон)
	if ($source_aspect_ratio > $desired_aspect_ratio) {
		// Исходное изображение шире, чем желаемое соотношение
		$temp_width = $result_width;
		$temp_height = (int) ($result_width / $source_aspect_ratio);
	} else {
		// Исходное изображение выше или равно по соотношению
		$temp_height = $result_height;
		$temp_width = (int) ($result_height * $source_aspect_ratio);
	}

	// Создаем временные изображения с новыми размерами
	$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
	$desired_gdim = imagecreatetruecolor($result_width, $result_height);

	// Если изображение PNG или WebP, сохраняем прозрачность
	if ($source_type === IMAGETYPE_PNG || $source_type === IMAGETYPE_WEBP) {
		imagealphablending($temp_gdim, false);
		imagesavealpha($temp_gdim, true);
		imagealphablending($desired_gdim, false);
		imagesavealpha($desired_gdim, true);
	}

	// Масштабируем исходное изображение, сохраняя пропорции
	imagecopyresampled($temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height);

	// Вычисляем координаты обрезки, чтобы центрировать изображение
	$x0 = (int) round(($temp_width - $result_width) / 2);
	$y0 = (int) round(($temp_height - $result_height) / 2);

	// Кадрируем изображение, копируя центральную область
	imagecopy($desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $result_width, $result_height);

	// Добавляем соответствующее расширение к пути сохранения файла
	switch ($source_type) {
		case IMAGETYPE_GIF:
			$thumbnail_image_path .= '.gif';
			imagegif($desired_gdim, $thumbnail_image_path);
			break;
		case IMAGETYPE_JPEG:
			$thumbnail_image_path .= '.jpg';
			imagejpeg($desired_gdim, $thumbnail_image_path, 90); // 90% качество JPEG
			break;
		case IMAGETYPE_PNG:
			$thumbnail_image_path .= '.png';
			imagepng($desired_gdim, $thumbnail_image_path, 9); // Максимальная компрессия PNG
			break;
		case IMAGETYPE_WEBP:
			$thumbnail_image_path .= '.webp';
			imagewebp($desired_gdim, $thumbnail_image_path, 90); // 90% качество WebP
			break;
	}

	// Освобождаем память, уничтожая временные изображения
	imagedestroy($source_gdim);
	imagedestroy($temp_gdim);
	imagedestroy($desired_gdim);

	// Возвращаем имя созданного файла
	return pathinfo($thumbnail_image_path, PATHINFO_BASENAME);
}
