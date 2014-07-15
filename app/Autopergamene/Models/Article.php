<?php
namespace Autopergamene\Models;

use Autopergamene\Abstracts\AbstractModel;
use Lang;

/**
 * An article from the Blog
 */
class Article extends AbstractModel
{
	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * The Category the Article's in
	 *
	 * @return Category
	 */
	public function category()
	{
		return $this->belongsTo('Autopergamene\Models\Category');
	}

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Encode array of tags as JSON
	 *
	 * @param array $tags
	 */
	public function setTagsAttribute($tags)
	{
		@$this->setJsonAttribute('tags', $tags);
	}

	/**
	 * Get the imploded tags of the article
	 *
	 * @return string
	 */
	public function getTagsAttribute()
	{
		return $this->getJsonAttribute('tags');
	}

	/**
	 * Get the date in human format
	 *
	 * @return string
	 */
	public function getRelativeDateAttribute()
	{
		$date = $this->created_at->diffForHumans();
		if (Lang::getLocale() == 'en') {
			return $date;
		}

		return strtr(
			$date, array(
				'from now' => null,
				'ago'      => null,
				'days'     => 'jour(s)',
				'months'   => 'mois',
				'weeks'    => 'sem.',
				'week'     => 'sem.',
				'years'    => 'ans',
				'year'     => 'an',
			)
		);
	}

	/**
	 * Human-er date for articles
	 *
	 * @return string
	 */
	public function getCreationDateAttribute()
	{
		return $this->created_at->format('m/d/y');
	}
}
