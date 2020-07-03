<nav class="header dark">
  <div id="pageHeader"></div>
<span>Hydraulic Hose</span>
</nav>

<header class="dark">
        <h1>
            <?php
            if ($this->input("header")->isEmpty() && isset($title) && !empty($title)) {
                echo $this->input("header")->setDataFromResource($title);
            } else {
                echo $this->input("header");
            }
            ?>
        </h1>
    </header>