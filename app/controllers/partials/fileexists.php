<?php

namespace App;

use Sober\Controller\Controller;

trait FileExists {

  /**
   * Single level, Case Insensitive File Exists.
   *
   * Only searches one level deep. Based on
   * https://gist.github.com/hubgit/456028
   *
   * @param string $file The file path to search for.
   *
   * @return string The path if found, FALSE otherwise.
   */
  protected static function fileExistsSingle($file) {
      chdir($_SERVER['DOCUMENT_ROOT']);
      if (file_exists($file) === TRUE) {
          return $file;
      }

      return FALSE;

  }//end fileExistsSingle()

}
