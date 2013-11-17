mage-capitalism
===============

A capitalism simulation game, built on the Magento Lite framework


Rules:

- Players perform an action which results in them aquiring Points
    - The action can be as simple as clicking a button, or as complicated as playing a mini game
- Players can spend Points on another player, which results in the recieving player aquiring Money
    - The amount of Money aquired by the reciever is equal to [X percentage of the giver's amount of Money] + .01 (base factor)
- Players can opt into a sharing pool, by selecting a percentage of the wealth that they would like to share
    - When a player aquires Money (as a result of someone spending Points on them), a percentage of that income is directed to the pool
    - When Money is directed to the pool, everyone who is opted into the sharing pool (except the donor) receives a dividend based on their sharing percentage
        - [Player's Dividend] = ( [Player's Share Percentage] * [Total Pool Donation] ) / ( [Sum of all Players Share Percentages] - [Player's Share Percentage] )

- Players have access to several reports, feeds
    - List of all players
        - Includes Main Fields
        - Includes stats
            - Current Points
            - Current Money Amount
            - Total Points Aquired
            - Total Money Aquired
            - (other useful prospectus information)

    - List of all transactions, maybe feed of them happening
        - When a point is spent, who received money, how much went to the pool, who received money from the pool and how much
