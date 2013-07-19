<?php
namespace Autopergamene;

use Carbon;
use Underscore\Parse;
use URL;

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
   * Get the link to the Article
   *
   * @return string
   */
  public function getLinkAttribute()
  {
    return URL::action('ArticlesController@article', array(
      'categorySlug' => $this->category->id,
      'articleSlug'  => $this->slug));
  }

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
