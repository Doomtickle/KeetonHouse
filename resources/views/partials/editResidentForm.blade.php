<form action="{{ route('resident.update', $resident->id) }}" method="POST" id="residentEdit">
    {{csrf_field()}}
    {{ method_field("PATCH") }}
    <div class="columns">
        <div class="column is-offset-1 is-half">
            <div class="columns">
                {{ csrf_field() }}
                <div class="field is-horizontal">
                    <div class="column">
                        <label class="label">First Name</label>
                        <p class="control">
                            <input class="input" type="text" name="first_name" value="{{ $resident->first_name }}"
                                   required autofocus>
                        </p>
                    </div>
                    <div class="column">
                        <label class="label">Last Name</label>
                        <p class="control">
                            <input class="input" type="text" name="last_name" value="{{ $resident->last_name }}">
                        </p>
                    </div>
                    <div class="column is-1">
                        <label class="label has-text-centered">MI</label>
                        <p class="control">
                            <input class="input" type="text" name="middle_initial"
                                   value="{{ $resident->middle_initial }}">
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-3">
                    <label class="label">Date of birth</label>
                    <p class="control">
                        <input class="input" type="text" name="dob" id="dob" value="{{ $resident->dob }}">
                    </p>
                </div>
                <div class="column is-3">
                    <label class="label">Age</label>
                    <p class="control">
                        <input class="input" type="number" name="age" id="age" value="{{ $resident->age }}">
                    </p>
                </div>
                <div class="column is-6">
                    <label class="label">Drug of Choice</label>
                    <p class="control">
                        <span class="select">
                            <select name="drug" id="drug">
                                <option value="{{ $resident->drug }}">{{ $resident->drug }}</option>
                                @if($resident->drug !== 'Cocaine')
                                    <option value="Cocaine">Cocaine</option>
                                @endif
                                @if($resident->drug !== 'Alcohol')
                                    <option value="Alcohol">Alcohol</option>
                                @endif
                                @if($resident->drug !== 'Cannabis')
                                    <option value="Cannabis">Cannabis</option>
                                @endif
                                @if($resident->drug !== 'Amphetamines')
                                    <option value="Amphetamines">Amphetamines</option>
                                @endif
                                @if($resident->drug !== 'Barbiturates')
                                    <option value="Barbiturates">Barbiturates</option>
                                @endif
                                @if($resident->drug !== 'Poly Substance')
                                    <option value="Poly Substance">Poly Substance</option>
                                @endif
                                @if($resident->drug !== 'Opiates')
                                    <option value="Opiates">Opiates</option>
                                @endif
                                @if($resident->drug !== 'Morphine')
                                    <option value="Morphine">Morphine</option>
                                @endif
                                @if($resident->drug !== 'LSD')
                                    <option value="LSD">LSD</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="column is-offset-1">
                <div class="columns">
                    <div class="column is-half">
                        <label class="label">Sex</label>
                        <label class="radio">
                            <input type="radio" name="sex" value="M" checked>Male
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
                                    @if($resident->race !== 'American Indian or Alaskan Native')
                                        <option value="American Indian or Alaskan Native">American Indian or Alaskan Native</option>
                                    @endif
                                    @if($resident->race !== 'Asian')
                                        <option value="Asian">Asian</option>
                                    @endif
                                    @if($resident->race !== 'Black or African American')
                                        <option value="Black or African American">Black or African American</option>
                                    @endif
                                    @if($resident->race !== 'Native Hawaiian or Other Pacific Islander')
                                        <option value="Native Hawaiian or Other Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                                    @endif
                                    @if($resident->race !== 'White')
                                        <option value="White">White</option>
                                    @endif
                                    @if($resident->race !== 'Hispanic or Latino')
                                        <option value="Hispanic or Latino">Hispanic or Latino</option>
                                    @endif
                                </select>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">DOC Number</label>
                    <p class="control">
                        <input class="input" type="text" name="document_number"
                               value="{{ $resident->document_number }}">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Service Center Number</label>
                    <p class="control">
                        <input class="input" type="text" name="service_center_number"
                               value="{{ $resident->service_center_number }}">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Date of admission</label>
                    <p class="control">
                        <input class="input" type="text" name="date_of_admission" id="date_of_admission"
                               value="{{ $resident->date_of_admission }}">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Projected Discharge</label>
                    <p class="control">
                        <input class="input" type="text" name="projected_date_of_discharge"
                               id="projected_date_of_discharge" value="{{ $resident->projected_date_of_discharge }}">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Actual Date of Discharge</label>
                    <p class="control">
                        <input class="input" type="text" name="actual_date_of_discharge" id="actual_date_of_discharge"
                               value="{{ $resident->actual_date_of_discharge }}">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Status</label>
                    <p class="control">
                        <span class="select">
                            <select name="status" id="status">
                                <option value="{{ $resident->status }}">{{ $resident->status }}</option>
                                @if($resident->status !== 'DOP')
                                    <option value="DOP">DOP</option>
                                @endif
                                @if($resident->status !== 'Prob')
                                    <option value="Prob">Prob</option>
                                @endif
                                @if($resident->status !== 'PDO')
                                    <option value="PDO">PDO</option>
                                @endif
                                @if($resident->status !== 'CC')
                                    <option value="CC">CC</option>
                                @endif
                                @if($resident->status !== 'County')
                                    <option value="County">County</option>
                                @endif
                                @if($resident->status !== 'Federal')
                                    <option value="Federal">Federal</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Status At Discharge</label>
                    <p class="control">
                        <span class="select">
                            <select name="status_at_discharge" id="status-at-discharge">
                                <option value="{{ $resident->status_at_discharge }}">{{ $resident->status_at_discharge }}</option>
                                @if($resident->status_at_discharge !== 'Successful')
                                    <option value="Successful">Successful</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Unsuccessful')
                                    <option value="Unsuccessful">Unsuccessful</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Abscond')
                                    <option value="Abscond">Abscond</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Administrative')
                                    <option value="Administrative">Administrative</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Drug Use')
                                    <option value="Drug Use">Drug Use</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Non-Payment')
                                    <option value="Non-Payment">Non-Payment</option>
                                @endif
                                @if($resident->status_at_discharge !== 'Absenteeism')
                                    <option value="Absenteeism">Absenteeism</option>
                                @endif
                                @if($resident->status_at_discharge !== 'ReArrest')
                                    <option value="ReArrest">ReArrest</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Treatment Level</label>
                    <p class="control">
                        <span class="select">
                            <select name="treatment_level_placement" id="treatment-level-placement">
                                <option value="{{ $resident->treatment_level_placement }}">{{ $resident->treatment_level_placement }}</option>
                                @if($resident->treatment_level_placement !== 'Residential II')
                                    <option value="Residential II">Residential II</option>
                                @endif
                                @if($resident->treatment_level_placement !== 'OP Level I')
                                    <option value="OP Level I">OP Level I</option>
                                @endif
                                @if($resident->treatment_level_placement !== 'OP Level II')
                                    <option value="OP Level II">OP Level II</option>
                                @endif
                                @if($resident->treatment_level_placement !== 'OP Level III')
                                    <option value="OP Level III">OP Level III</option>
                                @endif
                                @if($resident->treatment_level_placement !== 'OP Level IV')
                                    <option value="OP Level IV">OP Level IV</option>
                                @endif
                                @if($resident->treatment_level_placement !== 'OP Day/Night')
                                    <option value="OP Day/Night">OP Day/Night</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Counselor</label>
                    <p class="control">
                        <input class="input" type="text" name="counselor" value="{{ $resident->counselor }}">
                    </p>
                </div>
                <div class="column">
                    <label class="label">Program Level</label>
                    <p class="control">
                        <span class="select">
                            <select name="program_level" id="program-level">
                                <option value="{{ $resident->program_level }}">{{ $resident->program_level }}</option>
                                @if($resident->program_level !== 'I')
                                    <option value="I">I</option>
                                @endif
                                @if($resident->program_level !== 'II')
                                    <option value="II">II</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
            </div>
            <div class="columns">
                <div class="column is-half">
                    <label class="label">Employer</label>
                    <p class="control">
                        <input class="input" type="text" name="employer" id="employer"
                               value="{{ $resident->employer }}">
                    </p>
                </div>
                <div class="column is-half">
                    <label class="label">Employment Date</label>
                    <p class="control">
                        <input class="input" type="text" name="employment_date" id="employment_date"
                               value="{{ $resident->employment_date }}">
                    </p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Payment Method</label>
                    <p class="control">
                        <span class="select">
                            <select id="payment-method" name="payment_method">
                                <option value="{{ $resident->payment_method }}">{{ $resident->payment_method }}</option>
                                @if($resident->payment_method !== 'Nonsecure')
                                    <option value="Nonsecure">Nonsecure</option>
                                @endif
                                @if($resident->payment_method !== 'DOC Funded')
                                    <option value="DOC Funded">DOC Funded</option>
                                @endif
                                @if($resident->payment_method !== 'DOC Self Pay')
                                    <option value="DOC Self Pay">DOC Self Pay</option>
                                @endif
                                @if($resident->payment_method !== 'WCFDI Self Pay')
                                    <option value="WCFDI Self Pay">WCFDI Self Pay</option>
                                @endif
                                @if($resident->payment_method !== 'DOC Co-pay')
                                    <option value="DOC Co-pay">DOC Co-pay</option>
                                @endif
                                @if($resident->payment_method !== 'County Self Pay')
                                    <option value="County Self Pay">County Self Pay</option>
                                @endif
                                @if($resident->payment_method !== 'Federal Self Pay')
                                    <option value="Federal Self Pay">Federal Self Pay</option>
                                @endif
                            </select>
                        </span>
                    </p>
                </div>
                <div class="column">
                    <label class="label">Referral Source</label>
                    <p class="control">
                        <span class="select">
                            <select id="referral-source" name="referral_source">
                                <option value="{{ $resident->referral_source }}">{{ $resident->referral_source }}</option>
                                @if($resident->referral_source !== 'DOC')
                                    <option value="DOC">DOC</option>
                                @endif
                                @if($resident->referral_source !== 'WCFDI')
                                    <option value="WCFDI">WCFDI</option>
                                @endif
                                @if($resident->referral_source !== 'County')
                                    <option value="County">County</option>
                                @endif
                                @if($resident->referral_source !== 'Federal')
                                    <option value="Federal">Federal</option>
                                @endif
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
