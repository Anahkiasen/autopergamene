<?php
namespace Autopergamene;

use HTML;
use URL;

/**
 * A media Category
 */
class Category extends BaseModel
{
	use Traits\HasSlugId;

	/**
	 * The localized fields
	 *
	 * @var array
	 */
	protected $polyglot = ['description'];

	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get all articles in a Category
	 *
	 * @return Collection
	 */
	public function articles()
	{
		return $this->hasMany('Autopergamene\Article')->latest();
	}

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Whether the category points to an external link or not
	 */
	public function isExternal()
	{
		return (bool) $this->getOriginal('link');
	}

	/**
	 * Get a link to the category's content
	 */
	public function getLinkAttribute()
	{
		// External link
		$link = $this->getOriginal('link');
		if ($link) {
			return $link;
		}

		return URL::action('CategoriesController@category', $this->id);
	}

	/**
	 * Get the category's thumb
	 */
	public function getThumbAttribute()
	{
		return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
	}
}
