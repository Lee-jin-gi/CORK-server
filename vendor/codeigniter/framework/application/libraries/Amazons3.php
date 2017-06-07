<?php defined ( 'BASEPATH' ) or exit ( 'u no here!' );
/** *********************************************************************
 * Packages : libraries
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */
//require APPPATH.'/third_party/aws/aws-autoloader.php';
//require  APPPATH.'/vendor/autoload.php';
//require APPPATH.'/third_party/aws/aws.phar';
require APPPATH.'/third_party/aws/aws.phar';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;
class Amazons3 {
	private $s3;
	private $bucket;
	function __construct() {
		$this->bucket = 'classprep.storage';
		$this->s3 = S3Client::factory ( [
				'credentials' => [
						'key'    => 'AKIAIFF2MAQWWDSUPYYQ',
						'secret' => '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'
				],
				'region' => 'us-west-2',
				'version'           => 'latest',
				'certificate_authority' => true,
				'scheme' => 'http'
		] );
	}
	public function up($file, $upload_file) {
		$this->s3->putObject ( [
				'Bucket' => $this->bucket,
				'Key' => $upload_file,
				'Body' => fopen($file['tmp_name'],'rb'),
				'ContentType'  => $file['type'],
				'ACL' => 'public-read'
		] );
	}
}
