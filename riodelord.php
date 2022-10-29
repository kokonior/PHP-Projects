<?php
/**
 * PHP library for file management.
 *
 * @link      https://github.com/riodelord
 * @since     1.0.0
 */
namespace riodelord\File;

/**
 * File handler.
 */
class File
{
    /**
     * Check if a file exists in a path or url.
     *
     * @since 1.1.3
     *
     * @param string $file → path or file url
     *
     * @return bool
     */
    public static function exists($file)
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $stream = stream_context_create(['http' => ['method' => 'HEAD']]);
            if ($content = @fopen($file, 'r', null, $stream)) {
                $headers = stream_get_meta_data($content);
                fclose($content);
                $status = substr($headers['wrapper_data'][0], 9, 3);

                return $status >= 200 && $status < 400;
            }

            return false;
        }

        return file_exists($file) && is_file($file);
    }

    /**
     * Delete file.
     *
     * @since 1.1.3
     *
     * @param string $file → file path
     *
     * @return bool
     */
    public static function delete($file)
    {
        return self::exists($file) && @unlink($file);
    }

    /**
     * Create directory.
     *
     * @since 1.1.3
     *
     * @param string $path → path where to create directory
     *
     * @return bool
     */
    public static function createDir($path)
    {
        return ! is_dir($path) && @mkdir($path, 0777, true);
    }

    /**
     * Copy directory recursively.
     *
     * @since 1.1.4
     *
     * @param string $fromPath → path from copy
     * @param string $toPath   → path to copy
     *
     * @return bool
     */
    public static function copyDirRecursively($from, $to)
    {
        if (! $path = self::getFilesFromDir($from)) {
            return false;
        }

        self::createDir($to = rtrim($to, '/') . '/');

        foreach ($path as $file) {
            if ($file->isFile()) {
                if (! copy($file->getRealPath(), $to . $file->getFilename())) {
                    return false;
                }
            } elseif (! $file->isDot() && $file->isDir()) {
                self::copyDirRecursively($file->getRealPath(), $to . $path);
            }
        }

        return true;
    }

    /**
     * Delete empty directory.
     *
     * @since 1.1.3
     *
     * @param string $path → path to delete
     *
     * @return bool
     */
    public static function deleteEmptyDir($path)
    {
        return is_dir($path) && @rmdir($path);
    }

    /**
     * Delete directory recursively.
     *
     * @since 1.1.3
     *
     * @param string $path → path to delete
     *
     * @return bool
     */
    public static function deleteDirRecursively($path)
    {
        if (! $paths = self::getFilesFromDir($path)) {
            return false;
        }

        foreach ($paths as $file) {
            if ($file->isFile()) {
                if (! self::delete($file->getRealPath())) {
                    return false;
                }
            } elseif (! $file->isDot() && $file->isDir()) {
                self::deleteDirRecursively($file->getRealPath());
                self::deleteEmptyDir($file->getRealPath());
            }
        }

        return self::deleteEmptyDir($path);
    }

    /**
     * Get files from directory.
     *
     * @since 1.1.3
     *
     * @param string $path → path where get files
     *
     * @return object|false →
     */
    public static function getFilesFromDir($path)
    {
        if (! is_dir($path)) {
            return false;
        }

        return new \DirectoryIterator(rtrim($path, '/') . '/');
    }
}