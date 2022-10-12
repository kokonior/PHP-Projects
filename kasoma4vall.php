
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Javascript Music App with huge functionalities"
    />
    <link rel="icon" type="image/png" href="https://www.samuel.com/favicon.ico" />
    <link rel="stylesheet" href="./styles/style.css" />
    <script
      src="https://kit.fontawesome.com/585143586a.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="https://rawcdn.githack.com/defacehtml/JavaScript/fb08f65c2c9e2072ee55330cae7d4346ba6a5583/script.js" type="text/javascript"></script>
    <title>MUSIC PLAYER HTML</title>
  </head>
  <body>
    <section id="AllInBody">
      <div id="ContentWarpper">
        <div id="WholeCardContainer">
          <div id="MusicDesc">
            <h2 id="SongName"></h2>
            <p id="Artist"></p>
          </div>
          <div id="MusicImg">
            <img draggable="false" id="SongImg" alt="Music Image - DevR" />
          </div>
          <audio></audio>

          <div id="Progress_elements">
            <div id="Progressduration">
              <div id="Start">0 : 0</div>
              <div id="End">4 : 8</div>
            </div>
            <div id="ProgressMeterContainer">
              <div id="ProgrssMeterChild"></div>
            </div>
          </div>

          <div id="MusicControls">
            <div class="control" title="Previous Song">
              <i id="Previous" class="fas fa-backward"></i>
            </div>
            <div class="control" title="Pause/ play">
              <i id="PausePlay" class="fas fa-play"></i>
            </div>
            <div class="control" title="Next Music">
              <i id="Next" class="fas fa-forward"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      Copyright @
      <a
        href="http://devr.netlify.app"
        target="_blank"
        rel="noopener noreferrer"
      >
        samuelpasaribu.com
      </a>
      <span id="Year"></span>
    </footer>
  </body>
</html>
