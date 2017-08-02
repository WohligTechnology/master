
  <div class="col-padder">
   <form method="post" action="<?php echo site_url('site/getpillarquestion');?>" enctype="multipart/form-data">
    <div class="">

      <div class="row">
        <div class="col s12 m6">
          <div class="row">
            <div class="col s4">
              <span class="c-span">Category name:</span>
            </div>
            <div class="col s8">
              <div class="cat-names">
                <input type="text" name="name" readonly="true" value="<?php echo $lastpillardetail->name;?>">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6">
          <div class="box-left">
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Question 1:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="questionone" value="<?php echo $getelevenpillarquestion[0]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 1:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionone" value="<?php echo $getelevenpillaroption[0]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 2:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optiontwo" value="<?php echo $getelevenpillaroption[1]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 3:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionthree" value="<?php echo $getelevenpillaroption[2]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 4:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionfour" value="<?php echo $getelevenpillaroption[3]->text;?>">
                  </div>
                </div>

            </div>
<!--
            <div class="row">
              <div class="col s12">
                <div class="btn-right pl52">
                  <button type="submit" class="btn-ch ">Change format </button>
                </div>
              </div>
            </div>
-->
          </div>
        </div>

        <div class="col s12 m6">
          <div class="box-left">
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Question 2:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="questiontwo" value="<?php echo $getelevenpillarquestion[1]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 1:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionfive" value="<?php echo $getelevenpillaroption[4]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 2:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionsix" value="<?php echo $getelevenpillaroption[5]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 3:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionseven" value="<?php echo $getelevenpillaroption[6]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 4:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optioneight" value="<?php echo $getelevenpillaroption[7]->text;?>">
                  </div>
                </div>

            </div>
<!--
            <div class="row">
              <div class="col s12">
                <div class="btn-right pl52">
                  <button type="submit" class="btn-ch ">Change format </button>
                </div>
              </div>
            </div>
-->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6">
          <div class="box-left">
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Question 3:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="questionthree" value="<?php echo $getelevenpillarquestion[2]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 1:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionnine" value="<?php echo $getelevenpillaroption[8]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 2:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionten" value="<?php echo $getelevenpillaroption[9]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 3:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optioneleven" value="<?php echo $getelevenpillaroption[10]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 4:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optiontwelve" value="<?php echo $getelevenpillaroption[11]->text;?>">
                  </div>
                </div>

            </div>
<!--
            <div class="row">
              <div class="col s12">
                <div class="btn-right pl52">
                  <button type="submit" class="btn-ch ">Change format </button>
                </div>
              </div>
            </div>
-->
          </div>
        </div>
        <div class="col s12 m6">
          <div class="box-left">
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Question 4:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="questionfour" value="<?php echo $getelevenpillarquestion[3]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 1:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionthirteen" value="<?php echo $getelevenpillaroption[12]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 2:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionfourteen" value="<?php echo $getelevenpillaroption[13]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 3:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionfifteen" value="<?php echo $getelevenpillaroption[14]->text;?>">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                  <span class="c-span">Answer 4:</span>
                </div>
                <div class="col s8">
                  <div class="cat-names">
                    <input type="text" name="optionsixteen" value="<?php echo $getelevenpillaroption[15]->text;?>">
                  </div>
                </div>

            </div>
<!--
            <div class="row">
              <div class="col s12">
                <div class="btn-right pl52">
                  <button type="submit" class="btn-ch ">Change format </button>
                </div>
              </div>
            </div>
-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div class="text-center">
             <button type="submit" class="waves-effect waves-light btn">Save</button>
          </div>
        </div>
      </div>
    </div>
      </form>
  </div>
  </div>
