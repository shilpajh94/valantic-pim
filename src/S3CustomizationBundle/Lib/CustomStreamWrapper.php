<?php
namespace S3CustomizationBundle\Lib;

use Aws\S3\StreamWrapper;


/**
 * Custom S3 stream wrapper extending Amazon S3 stream wrapper
 * to get the s3 path from pimcore path whenever a file is accessed on s3.
 *
 * Amazon S3 stream wrapper description is as follow
 *
 * Amazon S3 stream wrapper to use "s3://<bucket>/<key>" files with PHP
 * streams, supporting "r", "w", "a", "x".
 *
 * # Opening "r" (read only) streams:
 *
 * Read only streams are truly streaming by default and will not allow you to
 * seek. This is because data read from the stream is not kept in memory or on
 * the local filesystem. You can force a "r" stream to be seekable by setting
 * the "seekable" stream context option true. This will allow true streaming of
 * data from Amazon S3, but will maintain a buffer of previously read bytes in
 * a 'php://temp' stream to allow seeking to previously read bytes from the
 * stream.
 *
 * You may pass any GetObject parameters as 's3' stream context options. These
 * options will affect how the data is downloaded from Amazon S3.
 *
 * # Opening "w" and "x" (write only) streams:
 *
 * Because Amazon S3 requires a Content-Length header, write only streams will
 * maintain a 'php://temp' stream to buffer data written to the stream until
 * the stream is flushed (usually by closing the stream with fclose).
 *
 * You may pass any PutObject parameters as 's3' stream context options. These
 * options will affect how the data is uploaded to Amazon S3.
 *
 * When opening an "x" stream, the file must exist on Amazon S3 for the stream
 * to open successfully.
 *
 * # Opening "a" (write only append) streams:
 *
 * Similar to "w" streams, opening append streams requires that the data be
 * buffered in a "php://temp" stream. Append streams will attempt to download
 * the contents of an object in Amazon S3, seek to the end of the object, then
 * allow you to append to the contents of the object. The data will then be
 * uploaded using a PutObject operation when the stream is flushed (usually
 * with fclose).
 *
 * You may pass any GetObject and/or PutObject parameters as 's3' stream
 * context options. These options will affect how the data is downloaded and
 * uploaded from Amazon S3.
 *
 * Stream context options:
 *
 * - "seekable": Set to true to create a seekable "r" (read only) stream by
 *   using a php://temp stream buffer
 * - For "unlink" only: Any option that can be passed to the DeleteObject
 *   operation
 */
class CustomStreamWrapper extends StreamWrapper
{

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::stream_open($path, $mode, $options,$opened_path);
    }

    public function unlink($path)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::unlink($path);
    }

    /**
     * Provides information for is_dir, is_file, filesize, etc. Works on
     * buckets, keys, and prefixes.
     * @link http://www.php.net/manual/en/streamwrapper.url-stat.php
     */
    public function url_stat($path, $flags)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::url_stat($path, $flags);
    }


    /**
     * Support for mkdir().
     *
     * @param string $path    Directory which should be created.
     * @param int    $mode    Permissions. 700-range permissions map to
     *                        ACL_PUBLIC. 600-range permissions map to
     *                        ACL_AUTH_READ. All other permissions map to
     *                        ACL_PRIVATE. Expects octal form.
     * @param int    $options A bitwise mask of values, such as
     *                        STREAM_MKDIR_RECURSIVE.
     *
     * @return bool
     * @link http://www.php.net/manual/en/streamwrapper.mkdir.php
     */
    public function mkdir($path, $mode, $options)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::mkdir($path, $mode, $options);
    }

    public function rmdir($path, $options)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::rmdir($path, $options);
    }

    /**
     * Support for opendir().
     *
     * The opendir() method of the Amazon S3 stream wrapper supports a stream
     * context option of "listFilter". listFilter must be a callable that
     * accepts an associative array of object data and returns true if the
     * object should be yielded when iterating the keys in a bucket.
     *
     * @param string $path    The path to the directory
     *                        (e.g. "s3://dir[</prefix>]")
     * @param string $options Unused option variable
     *
     * @return bool true on success
     * @see http://www.php.net/manual/en/function.opendir.php
     */
    public function dir_opendir($path, $options)
    {
        $path = $this->getS3PathForPimcorePath($path);

        return parent::dir_opendir($path, $options);
    }

    /**
     * Called in response to rename() to rename a file or directory. Currently
     * only supports renaming objects.
     *
     * @param string $path_from the path to the file to rename
     * @param string $path_to   the new path to the file
     *
     * @return bool true if file was successfully renamed
     * @link http://www.php.net/manual/en/function.rename.php
     */
    public function rename($path_from, $path_to)
    {
        $path_from = $this->getS3PathForPimcorePath($path_from);
        $path_to = $this->getS3PathForPimcorePath($path_to);

        return parent::rename($path_from, $path_to);
    }

    private function getS3PathForPimcorePath($pimcorePath)
    {
        $service =  \Pimcore::getKernel()->getContainer()->get(\S3CustomizationBundle\Services\S3CustomizationService::class);
        return $service->getS3PathForPimcorePath($pimcorePath);
    }

}
