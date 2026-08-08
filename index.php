<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="robots" content="noindex">
  <title>Dinaledi Website Design Proposals</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&family=Fraunces:opsz,wght@9..144,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="selector.css">
</head>
<body>
  <header><b>Dinaledi Leisure Resort</b><span>Client design review</span></header>
  <main>
    <section class="intro">
      <div class="review-label">Website design proposals</div>
      <div class="intro-copy"><small>THIS IS NOT THE FINAL WEBSITE</small><h1>Choose the<br><em>design theme.</em></h1><p>Open both proposals below. Compare the visual style, layout and experience, then choose the direction that should become the final Dinaledi website.</p></div>
      <div class="steps"><span><b>01</b>Open a proposal</span><span><b>02</b>Explore the full page</span><span><b>03</b>Choose one direction</span></div>
      <nav class="quick-links" aria-label="Open a proposal"><a href="prop1/">Open Proposal 1</a><a href="prop2/">Open Proposal 2</a></nav>
    </section>

    <section class="proposals" aria-label="Website proposals">
      <article class="proposal bold" data-href="prop1/" role="link" tabindex="0" aria-label="Open Proposal 1, Dinaledi Passport">
        <a class="preview" href="prop1/"><img src="images/web/pool-wide.jpg" alt="Preview of Proposal 1"><span>VIEW THE FULL PROPOSAL →</span></a>
        <div class="proposal-copy"><div class="number">01</div><small>BOLD · INTERACTIVE · CONTENT-RICH</small><h2>Dinaledi<br>Passport</h2><p>A high-energy direction with strong typography, visible service information and detailed visitor itineraries.</p><ul><li>Bold blue and yellow palette</li><li>Passport-inspired structure</li><li>Detailed and energetic</li></ul><a href="prop1/">Open Proposal 1 →</a></div>
      </article>

      <div class="or"><span>OR</span><p>Compare both before choosing</p></div>

      <article class="proposal social" data-href="prop2/" role="link" tabindex="0" aria-label="Open Proposal 2, Dinaledi Social Club">
        <a class="preview" href="prop2/"><img src="images/web/gathering.jpg" alt="Preview of Proposal 2"><span>VIEW THE FULL PROPOSAL →</span></a>
        <div class="proposal-copy"><div class="number">02</div><small>SOCIAL · WARM · PLAYFUL</small><h2>Dinaledi<br>Social Club</h2><p>A bright outdoor-resort direction based on easy pool days, gatherings and the energy of being together.</p><ul><li>Sky, lime and coral palette</li><li>Organic photography shapes</li><li>Friendly and spontaneous</li></ul><a href="prop2/">Open Proposal 2 →</a></div>
      </article>
    </section>

    <footer><b>DECISION PAGE ONLY</b><p>After one proposal is approved, this selector will be removed and the chosen design will become the main website.</p></footer>
  </main>
  <script>document.querySelectorAll('.proposal[data-href]').forEach(card=>{card.addEventListener('click',event=>{if(!event.target.closest('a'))location.href=card.dataset.href});card.addEventListener('keydown',event=>{if(event.key==='Enter'||event.key===' '){event.preventDefault();location.href=card.dataset.href}})});</script>
</body>
</html>
