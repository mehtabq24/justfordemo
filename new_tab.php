<!DOCTYPE html>
<html>
<head>

	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
var tabs = document.querySelectorAll(".healthy_table_links");
var items = document.querySelectorAll(".card_section");
const arrayForm = Array.from(items);

for (var i = 0; i < tabs.length; i++) {
  tabs[i].addEventListener("click", function () {
    const displayItem = this.getAttribute("data-filter");
    console.log(displayItem);
    for (var l = 0; l < arrayForm.length; l++) {
    arrayForm[l].style.display = "none";
      if (arrayForm[l].getAttribute("data-category") == displayItem) {
        console.log(arrayForm[l].getAttribute("data-category"));
        arrayForm[l].style.display = "block";
      }
    }
  });
}
	</script>
</head>
<body>

	<section class="main_body" id="main_body">
    <div class="container">
      <div>
        <div class="row">
          <!-- Category Section For Desktop start  -->
          <div class="col-md-3 d-none d-lg-block">
            <div>
              <div class="side_menu">
                <ul id="healthy_table">
                  <li data-filter="healthy-living" class="healthy_table_links active_for_healthy"><a class="d-flex gap-2"><i
                        class="fas fa-heartbeat"></i>Healthy Living</a></li>
                  <li data-filter="adventure" class="healthy_table_links"><a class="d-flex gap-2"><i
                        class="fas fa-anchor"></i>Adventure</a></li>
                  <li data-filter="physical-activity" class="healthy_table_links"><a class="d-flex gap-2"><i
                        class="fas fa-running"></i>Physical Activity </a></li>
                  <li data-filter="cycling" class="healthy_table_links"><a class="d-flex gap-2"><i
                        class="fas fa-biking"></i>Cycling</a></li>
                  <li data-filter="sleep" class="healthy_table_links"><a class="d-flex gap-2"><i class="fas fa-bed"></i>Sleep</a>
                  </li>
                  <li data-filter="trekking" class="healthy_table_links"><a class="d-flex gap-2"><i
                        class="fas fa-mountain"></i>Trekking</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Category Section For Mobile End  -->

          <!-- Blog List Section Start  -->
          <div class="col-lg-9 mt-4 mt-sm-4 mt-lg-0">
            <div class="row">
              <div class="col-md-6">
                <div class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/beauty-woman-asian-cute-girl-feel-happy-eating-diet-food-fresh-salad-good-health-pink-background_1150-10221.jpg"
                          alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            Nutrition
                          </span>
                        </div>
                        <div class="card_heading">
                          Maintain a healthy body weight.
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 15-Aug-2020
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/healthy-eating-dieting-vegetarian-kitchen-healthy-concept-close-up-vegetable-salad-roll-fork-home_1428-588.jpg"
                          alt="">
                      </div>
                    </div>
                    <div data-category="adventure" class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            Nutrition
                          </span>
                        </div>
                        <div class="card_heading">
                          Eat regularly, control the portion size.
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 15-Aug-2020
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div data-category="cycling" class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/girl-granola-honey-blue-white-natural_1428-679.jpg"
                          alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            health
                          </span>
                        </div>
                        <div class="card_heading">
                          the best way to cook vagetables for daily consumption
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 16-Dec-2021
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div data-category="sleep" class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/beauty-woman-asian-cute-girl-feel-happy-eating-diet-food-fresh-salad-good-health-pink-background_1150-10221.jpg"
                          alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            Nutrition
                          </span>
                        </div>
                        <div class="card_heading">
                          Maintain a healthy body weight.
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 21-Feb-2020
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/beauty-woman-asian-cute-girl-feel-happy-eating-diet-food-fresh-salad-good-health-pink-background_1150-10221.jpg"
                          alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            Nutrition
                          </span>
                        </div>
                        <div class="card_heading">
                          Maintain a healthy body weight.
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 21-Feb-2020
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card_section">
                  <div class="row">
                    <div class="col-4 ">
                      <div class="card_section_img">
                        <img
                          src="https://image.freepik.com/free-photo/healthy-eating-dieting-vegetarian-kitchen-healthy-concept-close-up-vegetable-salad-roll-fork-home_1428-588.jpg"
                          alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="card_section_info">
                        <div>
                          <span class="badge category">
                            Nutrition
                          </span>
                        </div>
                        <div class="card_heading">
                          Eat regularly, control the portion size.
                        </div>
                        <div class="card_desc">
                          Lorem, ipsum dolor sit amet consectetur
                        </div>
                        <div class="detail_section d-flex justify-content-between">
                          <div class="d-flex gap-2">
                            <div class="date">
                              <i class="fas fa-calendar-week"></i> 15-Aug-2020
                            </div>
                            <!-- <div class="edit">
                                                                <i class="fas fa-pencil-alt"></i> edit
                                                            </div> -->
                          </div>
                          <div class="comment">
                            <i class="fas fa-comment"></i> comment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="button" class="btn btn-primary btn-pagination mx-2">
                < Prev</button>
                  <button type="button" class="btn btn-primary btn-pagination">Next ></button>
            </div>
          </div>
          <!-- Blog List Section End  -->

        </div>
      </div>
    </div>
  </section>

</body>
</html>