<?php
/**
 * Plugin Name: Wp Random Filename
 * Plugin URI:  https://github.com/massat/wp-random-filename
 * Description: A plugin for WordPress to randomize filename on upload.
 * Version: 0.1
 */

/**
 * Filter {@see sanitize_file_name()} and return randomized filename.
 *
 * @param string $filename
 * @return string
 */

function make_randomized_filename($filename) {
  $info = pathinfo($filename);
  $ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
  $name = basename($filename, $ext);
  return md5(uniqid(rand(), true)) . $ext;
}
add_filter('sanitize_file_name', 'make_randomized_filename', 10);
