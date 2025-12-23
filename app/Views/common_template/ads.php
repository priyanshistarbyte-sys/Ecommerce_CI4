<!-- Banner Ad -->
<div id="banner-ad" style="height: 250px; text-align: center; margin: 20px 0"></div>
<script>
    googletag.cmd.push(() => {
        googletag.display("banner-ad");
    });
</script>

<!-- Rewarded Ad -->
<script>
    let rewardedSlot;
    googletag.cmd.push(function() {
        try {
            rewardedSlot = googletag.defineOutOfPageSlot("/22639388115/rewarded_web_example", googletag.enums.OutOfPageFormat.REWARDED);
            if (rewardedSlot) {
                rewardedSlot.addService(googletag.pubads());
                googletag.pubads().addEventListener('rewardedSlotReady', (event) => {
                    console.log('Rewarded ad ready:', event.slot.getSlotId().getId());
                    if (event.slot === rewardedSlot) {
                        event.makeRewardedVisible();
                    }
                });
                googletag.pubads().addEventListener('rewardedSlotClosed', (event) => {
                    console.log('Rewarded ad closed:', event.slot.getSlotId().getId());
                    if (event.slot === rewardedSlot) {
                        googletag.destroySlots([rewardedSlot]);
                        rewardedSlot = null;
                    }
                });
                googletag.pubads().addEventListener('rewardedSlotGranted', (event) => {
                    console.log('Reward granted:', event.payload);
                });
                googletag.display(rewardedSlot);
            }
        } catch (error) {
            console.error('Rewarded ad error:', error);
        }
    });
</script>