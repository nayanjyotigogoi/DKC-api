<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MagazineArticle extends Model {
    protected $fillable = ['magazine_issue_id','title','excerpt','content','author','tag','sort_order'];
    public function issue() { return $this->belongsTo(MagazineIssue::class, 'magazine_issue_id'); }
}
