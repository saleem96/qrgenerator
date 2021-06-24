<?php
/**
 * V CARD
 */
if (qrcdr()->getConfig('vcard') == true) { ?>
    <div class="tab-pane fade <?php if ($getsection === "#vcard") echo "show active"; ?>" id="vcard">
        <h4><?php echo qrcdr()->getString('vcard'); ?></h4>
        <div class="row">
            <div class="col-12 form-group">
                <label><?php echo qrcdr()->getString('version'); ?></label>
                <select class="form-select custom-select" name="vversion">
                  <option value="2.1">2.1</option>
                  <option value="3.0">3.0</option>
                  <!--
                  <option value="4.0">4.0</option>
                    -->
                </select>
            </div>

            <div class="col-md-2 form-group">
                <label><?php echo qrcdr()->getString('name_title'); ?></label>
                <input type="text" name="vnametitle" class="form-control">
            </div>
            <div class="col-md-5 form-group">
                <label><?php echo qrcdr()->getString('first_name'); ?></label>
                <input type="text" name="vname" class="form-control" placeholder="first name" required="required">
            </div>
            <div class="col-md-5 form-group">
                 <label><?php echo qrcdr()->getString('last_name'); ?></label>
                <input type="text" name="vlast" placeholder="last name" class="form-control">
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('phone_home'); ?></label>
                <div class="row no-gutters">
                    <div class="col-4">
                        <?php
                        $output = '<select class="form-select custom-select" name="countrycodevphone">';
                        foreach ($countries as $i=>$row) {
                            $output .= '<option value="'.$row['code'].'" label="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        $output .= '</select>';
                        echo $output;
                        ?>
                    </div>
                    <div class="col-8">
                        <input type="number" name="vphone" placeholder="Enter phone number" placeholder="" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('phone_mobile'); ?></label>
                <div class="row no-gutters">
                    <div class="col-4">
                        <?php
                        $output = '<select class="form-select custom-select" name="countrycodevmobile">';
                        foreach ($countries as $i=>$row) {
                            $output .= '<option value="'.$row['code'].'" label="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        $output .= '</select>';
                        echo $output;
                        ?>
                    </div>
                    <div class="col-8">
                        <input type="number" name="vmobile" placeholder="Enter mobile number" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('email'); ?></label>
                <input type="email" name="vemail" placeholder="Enter email" class="form-control">
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('website'); ?></label>
                <input type="text" name="vurl" placeholder="website link" class="form-control" placeholder="http://">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('facebook'); ?></label>
                <input type="text" name="vurl" placeholder="facebook link" class="form-control" placeholder="http://">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('instagram'); ?></label>
                <input type="text" name="vurl" placeholder="instagram link" class="form-control" placeholder="http://">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('twitter'); ?></label>
                <input type="text" name="vurl" placeholder="twitter link" class="form-control" placeholder="http://">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('linkedin'); ?></label>
                <input type="text" name="vurl" placeholder="linkedin link" class="form-control" placeholder="http://">
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('company'); ?></label>
                <input type="text" name="vcompany" placeholder="Company" class="form-control">
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('jobtitle'); ?></label>
                <input type="text" name="vtitle" placeholder="Enter job title" class="form-control">
            </div>

            <div class="col-md-6 orm-group">
                <label><?php echo qrcdr()->getString('phone_office'); ?></label>
                <div class="row no-gutters">
                    <div class="col-4">
                        <?php
                        $output = '<select class="form-select custom-select" name="countrycodevoffice">';
                        foreach ($countries as $i=>$row) {
                            $output .= '<option value="'.$row['code'].'" label="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        $output .= '</select>';
                        echo $output;
                        ?>
                    </div>
                    
                    <div class="col-8">
                        <input type="number" name="vofficephone" placeholder="Enter office number" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('fax'); ?></label>
                <div class="row no-gutters">
                    <div class="col-4">
                        <?php
                        $output = '<select class="form-select custom-select" name="countrycodevfax">';
                        foreach ($countries as $i=>$row) {
                            $output .= '<option value="'.$row['code'].'" label="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        $output .= '</select>';
                        echo $output;
                        ?>
                    </div>
                    
                    <div class="col-8">
                        <input type="number" name="vfax" placeholder="Enter fax number" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-12 form-group">
                 <label><?php echo qrcdr()->getString('address'); ?></label>
                <textarea name="vaddress" class="form-control" placeholder="Enter your complete Address" maxlength="255"></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('post_code'); ?></label>
                <input type="text" name="vcap" placeholder="Enter post ode" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('city'); ?></label>
                <input type="text" name="vcity" placeholder="Enter city" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('state'); ?></label>
                <input type="text" name="vstate" placeholder="Enter state" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label><?php echo qrcdr()->getString('country'); ?></label>
                <input type="text" name="vcountry" placeholder="Enter country" class="form-control">
            </div>
        <?php
        /*
            <div class="col-12">
                 <label><?php echo qrcdr()->getString('note'); ?></label>
                <textarea name="vnote" class="form-control" maxlength="255"></textarea>
            </div>
        */ ?>
        </div>
    </div>
    <?php
}
