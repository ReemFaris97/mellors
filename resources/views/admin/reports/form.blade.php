                <div class="form-group">
                    <label for="last_name">Select Park</label>
                    {!! Form::select('park_id',$parks,null, array('class' => 'form-control select2')) !!}
                </div>
                <div class="form-group">
                    <label for="middle_name">Date </label>
                    {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
                </div>
                <div class="col-xs-12">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
                    </div>
                </div>