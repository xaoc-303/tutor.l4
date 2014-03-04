<?php

class BaseObserver {

    public function creating(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function created(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function updating(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function updated(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function saving(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function saved(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function deleting(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function deleted(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function restoring(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

    public function restored(Eloquent $model) {Log::info(__CLASS__.'::'.__FUNCTION__);}

}