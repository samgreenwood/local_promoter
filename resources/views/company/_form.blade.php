<section>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="form-create-agency-title">Company Name:</label>
                <input name="name" type="text" class="form-control" id="form-create-agency-title" required="" value="{{$company->name}}">
            </div><!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="form-create-agency-title">Type:</label>
                <input name="type" type="text" class="form-control" required="" value="{{$company->type}}">
            </div><!-- /.form-group -->
        </div>
    </div>

    <div class="form-group">
        <label for="form-create-agency-description">Description</label>
        <textarea name="description" class="form-control" id="form-create-agency-description" rows="4" required="">{{$company->description}}</textarea>
    </div><!-- /.form-group -->
</section>
<h3>Contact Information</h3>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <section id="address">
            <div class="form-group">
                <label for="form-create-agency-address-1">Address Line 1:</label>
                <input name="address1" type="text" class="form-control" id="form-create-agency-address-1" required="" value="{{$company->address1}}">
            </div><!-- /.form-group -->
            <div class="form-group">
                <label for="form-create-agency-address-2">Address Line 2:</label>
                <input name="address2" type="text" class="form-control" id="form-create-agency-address-2" required="" value="{{$company->address2}}">
            </div><!-- /.form-group -->
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="form-create-agency-city">Suburb:</label>
                        <input name="town" type="text" class="form-control" id="form-create-agency-city" required="" value="{{$company->town}}">
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="form-create-agency-city">State:</label>
                        <select name="state" id="state">
                            <option value="SA">SA</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="WA">WA</option>
                            <option value="TAS">TAS</option>
                            <option value="NT">NT</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-8 -->

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="form-create-agency-zip">Postcode:</label>
                        <input name="postcode" type="text" class="form-control" id="form-create-agency-zip" required="" value="{{$company->postcode}}">
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </section><!-- /#address -->
    </div><!-- /.col-md-6 -->
    <div class="col-md-6 col-sm-6">
        <section id="contacts">
            <div class="form-group">
                <label for="form-create-agency-email">Email:</label>
                <input name="email" type="email" class="form-control" id="form-create-agency-email" required="" value="{{$company->email}}">
            </div><!-- /.form-group -->
            <div class="form-group">
                <label for="form-create-agency-phone">Phone:</label>
                <input name="phone" type="tel" class="form-control" id="form-create-agency-phone" value="{{$company->phone}}">
            </div><!-- /.form-group -->
            <div class="form-group">
                <label for="form-create-agency-website">Website:</label>
                <input name="website" type="text" class="form-control" id="form-create-agency-website" value="{{$company->website}}">
            </div><!-- /.form-group -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </section><!-- /#address -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->