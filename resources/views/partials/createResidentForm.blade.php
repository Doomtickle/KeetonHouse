<div id="form-error-box" class="column is-offset-3 is-6 notification is-danger" style="display:none">
    <ul id="form-error-list">
    </ul>
</div>
<form action="{{ route('resident.store') }}" method="POST" id="residentCreate">
    <input type="hidden" name="facility" value="{{ \Auth::user()->facility }}">
    <div class="columns">
        <div class="column is-offset-1 is-half">
            <div class="columns">
                {{ csrf_field() }}
                <div class="field is-horizontal">
                    <div class="column">
                        <label class="label">First Name <sup>*</sup></label>
                        <p class="control">
                            <input class="input" type="text" name="first_name" required autofocus>
                        </p>
                    </div>
                    <div class="column">
                        <label class="label">Last Name <sup>*</sup></label>
                        <p class="control">
                            <input class="input" type="text" name="last_name">
                        </p>
                    </div>
                    <div class="column is-1">
                        <label class="label has-text-centered">MI <sup>*</sup></label>
                        <p class="control">
                            <input class="input" type="text" name="middle_initial">
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-3">
                    <label class="label">Date of birth <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="dob" id="dob">
                    </p>
                </div>
                <div class="column is-3">
                    <label class="label">Age <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="number" name="age" id="age">
                    </p>
                </div>
                <div class="column is-6">
                    <label class="label">Drug of Choice <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select name="drug" id="drug">
                                <option value="">Select substance</option>
                                <option value="Cocaine">Cocaine</option>
                                <option value="Alcohol">Alcohol</option>
                                <option value="Cannabis">Cannabis</option>
                                <option value="Amphetamines">Amphetamines</option>
                                <option value="Barbiturates">Barbiturates</option>
                                <option value="Poly Substance">Poly Substance</option>
                                <option value="Opiates">Opiates</option>
                                <option value="Morphine">Morphine</option>
                                <option value="LSD">LSD</option>
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="column is-offset-1">
                <div class="columns">
                    <div class="column is-half">
                        <label class="label">Sex <sup>*</sup></label>
                        <label class="radio">
                            <input type="radio" name="sex" value="M">Male
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" value="F">Female
                        </label>
                    </div>
                    <div class="column is-half">
                        <label class="label">Race <sup>*</sup></label>
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
                    <label class="label">DOC Number <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="document_number">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Service Center Number <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="service_center_number">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Date of admission <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="date_of_admission" id="date_of_admission">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Projected Discharge <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="projected_date_of_discharge"
                               id="projected_date_of_discharge">
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
                    <label class="label">Status <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select name="status" id="status">
                                <option value="">Status</option>
                                <option value="DOP">DOP</option>
                                <option value="Prob">Prob</option>
                                <option value="PDO">PDO</option>
                                <option value="CC">CC</option>
                                <option value="County">County</option>
                                <option value="Federal">Federal</option>
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Status At Discharge</label>
                    <p class="control">
                        <span class="select">
                            <select name="status_at_discharge" id="status-at-discharge">
                                <option value="">Select Status at Discharge</option>
                                <option value="Successful">Successful</option>
                                <option value="Unsuccessful">Unsuccessful</option>
                                <option value="Abscond">Abscond</option>
                                <option value="Administrative">Administrative</option>
                                <option value="Drug Use">Drug Use</option>
                                <option value="Non-Payment">Non-Payment</option>
                                <option value="Absenteeism">Absenteeism</option>
                                <option value="ReArrest">ReArrest</option>
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Treatment Level <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select name="treatment_level_placement" id="treatment-level-placement">
                                <option value="">Select treatment level</option>
                                <option value="Residential II">Residential II</option>
                                <option value="OP Level I">OP Level I</option>
                                <option value="OP Level II">OP Level II</option>
                                <option value="OP Level III">OP Level III</option>
                                <option value="OP Level IV">OP Level IV</option>
                                <option value="OP Day/Night">OP Day/Night</option>
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Counselor <sup>*</sup></label>
                    <p class="control">
                        <input class="input" type="text" name="counselor">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Program Level <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select name="program_level" id="program-level">
                                <option value="">Select Program level</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <div class="columns">
                <div class="column is-half">
                    <label class="label">Employer</label>
                    <p class="control">
                        <input class="input" type="text" name="employer" id="employer">
                    </p>
                </div>
                <div class="column is-half">
                    <label class="label">Employment Date</label>
                    <p class="control">
                        <input class="input" type="text" name="employment_date" id="employment_date">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Payment Method <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select id="payment-method" name="payment_method">
                                <option value="">Select payment method</option>
                                <option value="Nonsecure">Nonsecure</option>
                                <option value="DOC Funded">DOC Funded</option>
                                <option value="DOC Self Pay">DOC Self Pay</option>
                                <option value="WCFDI Self Pay">WCFDI Self Pay</option>
                                <option value="DOC Co-pay">DOC Co-pay</option>
                                <option value="County Self Pay">County Self Pay</option>
                                <option value="Federal Self Pay">Federal Self Pay</option>
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Referral Source <sup>*</sup></label>
                    <p class="control">
                        <span class="select">
                            <select id="referral-source" name="referral_source">
                                <option value="">Select referral source</option>
                                <option value="DOC">DOC</option>
                                <option value="WCFDI">WCFDI</option>
                                <option value="County">County</option>
                                <option value="Federal">Federal</option>
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <div class="column">
                <button class="button is-primary" type="submit" id="residentSubmit">Submit</button>
            </div>
        </div>
    </div>
</form>
