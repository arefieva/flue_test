<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

namespace Fuel\Core;

/**
 * This exception is thrown when a package cannot be found.
 *
 * @package     Core
 * @subpackage  Packages
 */
class PackageNotFoundException extends \FuelException { }

/**
 * Handles all the loading, unloading and management of packages.
 *
 * @package     Core
 * @subpackage  Packages
 */
class Package
{
	/**
	 * @var  array  $packages  Holds all the loaded package information.
	 */
	protected static $packages = array();

	/**
	 * Loads the given package.  If a path is not given, if will search through
	 * the defined package_paths. If not defined, then PKGPATH is used.
	 * It also accepts an array of packages as the first parameter.
	 *
	 * @param   string|array  $package  The package name or array of packages.
	 * @param   string|null   $path     The path to the package
	 * @return  bool  True on success
	 * @throws  \PackageNotFoundException
	 */
	public static function load($package, $path = null)
	{
		if (is_array($package))
		{
			$result = true;
			foreach ($package as $pkg => $path)
			{
				if (is_numeric($pkg))
				{
					$pkg = $path;
					$path = null;
				}
				// MUST use external brackets due to prio('and') < prio('=') < prio('&&') -
				// don't remove them xor replace 'and' with '&&'
				$result = (static::load($pkg, $path) and $result);
			}
			return $result;
		}

		// unify the name
		$package = ucfirst($package);

		if (static::loaded($package))
		{
			return false;
		}

		// if no path is given, try to locate the package
		if ($path === null)
		{
			$paths = \Config::get('package_paths', array());
			empty($paths) and $paths = array(PKGPATH);

			if ( ! empty($paths))
			{
				foreach ($paths as $modpath)
				{
					if (is_dir($path = $modpath.strtolower($package).DS))
					{
						break;
					}
				}
			}

		}

		if ( ! is_dir($path))
		{
			throw new \PackageNotFoundException("Package '$package' could not be found at '".\Fuel::clean_path($path)."'");
		}

		\Finder::instance()->add_path($path, 1);
		\Fuel::load($path.'bootstrap.php');
		static::$packages[$package] = $path;

		return true;
	}

	/**
	 * Unloads a package from the stack.
	 *
	 * @param   string  $package  The package name
	 * @return  void
	 */
	public static function unload($package)
	{
		// unify the name
		$package = ucfirst($package);

		\Finder::instance()->remove_path(static::$packages[$package]);

		unset(static::$packages[$package]);
	}

	/**
	 * Checks if the given package is loaded, if no package is given then
	 * all loaded packages are returned.
	 *
	 * @param   string|null  $package  The package name or null
	 * @return  bool|array  Whether the package is loaded, or all packages
	 */
	public static function loaded($package = null)
	{
		if ($package === null)
		{
			return static::$packages;
		}

		// unify the name
		$package = ucfirst($package);

		return array_key_exists($package, static::$packages);
	}

	/**
	 * Checks if the given package exists.
	 *
	 * @param   string  $package  The package name
	 * @return  bool|string  Path to the package found, or false if not found
	 */
	public static function exists($package)
	{
		// unify the name
		$package = ucfirst($package);

		if (array_key_exists($package, static::$packages))
		{
			return static::$packages[$package];
		}
		else
		{
			$paths = \Config::get('package_paths', array());
			empty($paths) and $paths = array(PKGPATH);
			$package = strtolower($package);

			foreach ($paths as $path)
			{
				if (is_dir($path.$package))
				{
					return $path.$package.DS;
				}
			}
		}

		return false;
	}
}
