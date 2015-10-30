<!-- File: src/Template/Customers/add.ctp -->

<div class="container">
    <div class="row">
        <div class="form-group col-lg-6 col-sm-12">
            <?php
                if(isset($errorMsg) && $errorMsg) {
                    echo "<p class=\"alert alert-warning\">", htmlspecialchars($errorMsg), "</p>\n\n";
                }
            ?>
            <?php
                echo $this->Form->create($customer); ?>
            <fieldset> <legend>Personal Information</legend>
            <?php
                echo $this->Form->input('personName', array('class'=>'form-control'));
                echo $this->Form->input('phone', array('class'=>'form-control', 'size'=>'13'));
                echo $this->Form->input('email', array('class'=>'form-control')); ?>
                <fieldset> <legend>Address</legend>
               <?php 
                    echo $this->Form->input('street', array('class'=>'form-control')); 
                    echo $this->Form->input('province', array(
                        'options' => array('QC', 'MB', 'ON', 'SK'),
                        'empty' => 'Select'
                    ));
                    echo $this->Form->input('city', array('class'=>'form-control'));
                    echo $this->Form->input('postalCode', array('class'=>'form-control'));
                ?>
                </fieldset>
            </fieldset>
            <div class="form-group col-lg-12 col-sm-12 text-right">
               <button type="submit" class="btn btn-success" id="buttonOrder" name="buttonOrder">Order</button>
            </div>
             <?php
                //echo $this->Form->button(__('Save Customer'), array('id'=>'buttonOrder')); 
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
