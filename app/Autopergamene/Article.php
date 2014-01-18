<?php
namespace Autopergamene;

/**
 * An article from the Blog
 */
class Article extends BaseModel
{
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = array();

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
		return $this->belongsTo('Autopergamene\Category');
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
		$this->attributes['tags'] = json_encode($tags);
	}

	/**
	 * Get the imploded tags of the article
	 *
	 * @return string
	 */
	public function getTagsAttribute()
	{
		return json_decode($this->getOriginal('tags'), true);
	}

	public function getRelativeDateAttribute()
	{
		$date = $this->created_at->diffForHumans();

		return strtr($date, array(
			'from now' => null,
			'ago'      => null,
			'days'     => 'jour(s)',
			'months'   => 'mois',
			'weeks'    => 'sem.',
			'week'     => 'sem.',
			'years'    => 'ans',
			'year'     => 'an',
		));
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
