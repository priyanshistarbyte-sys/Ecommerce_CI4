

<!-- Rewarded Ad -->
<script>
    let rewardedSlot;
    let pendingProductUrl = null;

    function showRewardedAdForProduct(productUrl) {
        pendingProductUrl = productUrl;
        
        googletag.cmd.push(function() {
            try {
                // Destroy existing slot if any
                if (rewardedSlot) {
                    googletag.destroySlots([rewardedSlot]);
                    rewardedSlot = null;
                }
                
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
                            // Navigate to product page after ad is closed
                            if (pendingProductUrl) {
                                window.location.href = pendingProductUrl;
                                pendingProductUrl = null;
                            }
                        }
                    });
                    
                    googletag.pubads().addEventListener('rewardedSlotGranted', (event) => {
                        console.log('Reward granted:', event.payload);
                        // Navigate to product page after reward is granted
                        if (pendingProductUrl) {
                            window.location.href = pendingProductUrl;
                            pendingProductUrl = null;
                        }
                    });
                    
                    googletag.display(rewardedSlot);
                }
            } catch (error) {
                console.error('Rewarded ad error:', error);
                // If ad fails, navigate to product page anyway
                if (pendingProductUrl) {
                    window.location.href = pendingProductUrl;
                    pendingProductUrl = null;
                }
            }
        });
    }
</script>