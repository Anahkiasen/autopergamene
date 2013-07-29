<?php
namespace Autopergamene;

use Underscore\Parse;

/**
 * An article from the Blog
 */
class Article extends BaseModel
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'articles';

  /**
   * The relations to eager load on every query.
   *
   * @var array
   */
  protected $with = array('category');

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
   * Get the imploded tags of the article
   *
   * @return string
   */
  public function getTagsAttribute()
  {
    $tags = $this->getOriginal('tags');
    $tags = Parse::fromJSON($tags);

    return implode(', ', $tags);
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
