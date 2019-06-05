class Cat extends Eloquent {
    protected $fillable = ['name','date_of_birth','breed_id'];
    public function breed()
    {
        return $this->belongsTo('Breed');    
    }
}
