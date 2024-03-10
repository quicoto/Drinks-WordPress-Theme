(function () {
  document.addEventListener('click', (event) => {
    const $target = event.target;

    if ($target.matches('.checkin') && !$target.hasAttribute('disabled')) {
      $target.setAttribute('disabled', true);
      event.preventDefault();
      drinkId = $target.dataset.drink;

      const $spinner = $target.querySelector('.spinner');
      const $text = $target.querySelector('.text');

      $spinner.removeAttribute('hidden');
      $text.setAttribute('hidden', true);

      // Data for the Ajax Request
      const data = new FormData();

      data.append( 'action', 'drink_checkin' );
      data.append( 'nonce', drinks_ajax.nonce );
      data.append( 'drinkid', drinkId );

      fetch(drinks_ajax.ajax_url, {
          method: "POST",
          credentials: 'same-origin',
          body: data
        })
        .then((response) => response.text())
        .then(() => {
          const $timesDrankCount = document.querySelector(`.times-drank[data-drink="${drinkId}"]`);

          $timesDrankCount.textContent = +$timesDrankCount.textContent + 1;

          $spinner.setAttribute('hidden', true);
          $text.textContent = '✅ Checked in!';
          $text.removeAttribute('hidden');

          setInterval(() => {
            $text.textContent = 'Check-in';
            $target.removeAttribute('disabled');
          }, 2000);
        })
        .catch((error) => {
          console.log('[Drinks - error]');
          console.error(error);
        });
    }
  });
}());