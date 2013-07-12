<?php
use Underscore\Parse;

/**
 * An article from the Blog
 */
class Article extends BaseModel
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
    return $this->belongsTo('Category');
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
    list ($month, $day, $year) = explode('/', $this->created_at);
    $date = Carbon::createFromDate('20'.$year, $month, $day)->diffForHumans();

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
  public function getCreatedAtAttribute()
  {
    $date = $this->getOriginal('created_at');
    $date = new DateTime($date);

    return $date->format('m/d/y');
  }

}
