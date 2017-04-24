<form action="{{ route('resident.store') }}" method="POST" id="residentCreate">
    <div class="columns">
        <div class="column is-offset-1 is-half">
            <div class="columns">
                {{ csrf_field() }}
                <div class="field is-horizontal">
                    <div class="column">
                        <label class="label">First Name</label>
                        <p class="control">
                            <input class="input" type="text" name="first_name" required autofocus>
                        </p>
                    </div>
                    <div class="column">
                        <label class="label">Last Name</label>
                        <p class="control">
                            <input class="input" type="text" name="last_name">
                        </p>
                    </div>
                    <div class="column is-1">
                        <label class="label has-text-centered">MI</label>
                        <p class="control">
                            <input class="input" type="text" name="middle_initial">
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-3">
                    <label class="label">Date of birth</label>
                    <p class="control">
                        <input class="input" type="text" name="dob" id="dob">
                    </p>
                </div>
                <div class="column is-3">
                    <label class="label">Age</label>
                    <p class="control">
                        <input class="input" type="number" name="age" id="age">
                    </p>
                </div>
                <div class="column is-6">
                    <label class="label">Drug of Choice</label>
                    <p class="control">
                        <input class="input" type="string" name="drug">
                    </p>
                </div>
            </div>
            <hr>
            <div class="column is-offset-1">
                <div class="columns">
                    <div class="column is-half">
                        <label class="label">Sex</label>
                        <label class="radio">
                            <input type="radio" name="sex" value="M">Male
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" value="F">Female
                        </label>
                    </div>
                    <div class="column is-half">
                        <label class="label">Race</label>
                        <p class="control">
                            <span class="select">
                                <select class="race" name="race">
                                    <option value="Caucasian">Caucasian</option>
                                    <option value="African American">African American</option>
                                </select>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Document Number</label>
                    <p class="control">
                        <input class="input" type="text" name="document_number">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Service Center Number</label>
                    <p class="control">
                        <input class="input" type="text" name="service_center_number">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Date of admission</label>
                    <p class="control">
                        <input class="input" type="text" name="date_of_admission" id="date_of_admission">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Projected Discharge</label>
                    <p class="control">
                        <input class="input" type="text" name="projected_date_of_discharge" id="projected_date_of_discharge">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Actual Date of Discharge</label>
                    <p class="control">
                        <input class="input" type="text" name="actual_date_of_discharge" id="actual_date_of_discharge">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Status</label>
                    <p class="control">
                        <input class="input" type="text" name="status">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Status At Discharge</label>
                    <p class="control">
                        <input class="input" type="text" name="status_at_discharge">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Treatment Level</label>
                    <p class="control">
                        <input class="input" type="text" name="treatment_level_placement">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Counselor</label>
                    <p class="control">
                        <input class="input" type="text" name="counselor">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Program Level</label>
                    <p class="control">
                        <input class="input" type="text" name="program_level">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Employment Date</label>
                    <p class="control">
                        <input class="input" type="text" name="employment_date" id="employment_date">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Payment Method</label>
                    <p class="control">
                        <input class="input" type="text" name="payment_method">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Referral Source</label>
                    <p class="control">
                        <input class="input" type="text" name="referral_source">
                    </p>
                </div>
            </div>
            <div class="column">
                <button class="button is-primary" type="submit" id="residentSubmit">Submit</button>
            </div>
        </div>
    </div>
</form>
