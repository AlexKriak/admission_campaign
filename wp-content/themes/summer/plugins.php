<?php
class FignelThemePlugins {
  private function _getPluginLink(string $plaginPageUrl) {
    $page = file_get_contents($plaginPageUrl);

    $index = strpos($page, "plugin-download");
    $start = strpos($page, "https", $index);
    $end = strpos($page, "\"", $start);

    return substr($page, $start, $end-$start);
  }

  private function _plugin_download(string $url, string $path) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);

    return file_put_contents($path, $data);
  }

  private function _plugin_unpack(string $path, $filder) {
    $zip = new \ZipArchive;

    if($zip->open($path)){
      $zip->extractTo($filder);
      $zip->close();
  
    }

    unlink($path);
  }

  private function _plugin_activate($installer) {
    $current = get_option('active_plugins');
    $plugin = plugin_basename(trim($installer));

    if(!in_array($plugin, $current)) {
      $current[] = $plugin;
      sort($current);
      do_action('activate_plugin', trim($plugin));
      update_option('active_plugins', $current);
      do_action('activate_'.trim($plugin));
      do_action('activated_plugin', trim($plugin));
      return true;
    } else
     return false;
  }

  public static function AddPlugins($plugins) {
    $wp = new self();

    foreach($plugins as $plugin) {
      $plugins_folder = WP_CONTENT_DIR . "/plugins";
      $zip_file = "$plugins_folder/" . $plugin['name'].".zip";

      $latest = $wp->_getPluginLink($plugin['path']);
      $wp->_plugin_download($latest, $zip_file);
      $wp->_plugin_unpack($zip_file, $plugins_folder);
      $wp->_plugin_activate($plugin['install']);
    }
  }

} 
