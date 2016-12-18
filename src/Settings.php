<?php

namespace Drupal\activeforanimals;

/**
 * Provides authentication keys.
 *
 * This class is stored in the /private directory which
 * adds a layer of protection against unwanted access.
 */
class Settings {

  /**
   * Environment values.
   */
  const ENVIRONMENT_LIVE = 'live';
  const ENVIRONMENT_TEST = 'test';
  const ENVIRONMENT_DEV = 'dev';
  private static $json_path = 'sites/default/files/private/keys.json';

  /**
   * Get settings.
   *
   * @return array
   *   Settings array.
   */
  private static function getSettings() {
    $json_keys = file_get_contents(self::$json_path);
    $data = json_decode($json_keys, TRUE);
    return $data;
  }

  /**
   * Return API key for Google services.
   *
   * @return string
   *   The API key.
   */
  public static function getGoogleAPIKey() {
    $key = NULL;
    if(defined('PANTHEON_ENVIRONMENT')) {
      $data = self::getSettings();
      switch (PANTHEON_ENVIRONMENT) {
        case self::ENVIRONMENT_LIVE:
          $key = $data['google']['maps'];
          break;

        case self::ENVIRONMENT_TEST:
          $key = $data['google']['maps'];
          break;

        case self::ENVIRONMENT_DEV:
          $key = $data['google']['maps'];
          break;

      }
    }
    return $key;
  }

}

